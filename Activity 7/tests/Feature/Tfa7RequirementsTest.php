<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class Tfa7RequirementsTest extends TestCase
{
    use RefreshDatabase;

    public function test_all_four_original_routes_work(): void
    {
        $this->get('/')->assertOk()->assertSee('Good day');
        $this->get('/about')->assertOk()->assertSee('Three stages');
        $this->get('/customers')->assertOk()->assertSee('Customer directory');
        $this->get('/users')->assertOk()->assertSee('User directory');
    }

    public function test_seeder_populates_at_least_five_of_each_record(): void
    {
        $this->seed(DatabaseSeeder::class);
        $this->assertGreaterThanOrEqual(5, Customer::count());
        $this->assertGreaterThanOrEqual(5, User::count());
    }

    public function test_customer_creation_requires_a_name_and_valid_email(): void
    {
        $this->post(route('customers.store'), ['full_name' => '', 'email' => 'invalid'])
            ->assertSessionHasErrors(['full_name', 'email']);

        $this->post(route('customers.store'), [
            'full_name' => 'Test Customer',
            'email' => 'test.customer@example.com',
            'phone' => '09171234567',
        ])->assertRedirect(route('customers.index'));

        $this->assertDatabaseHas('customers', ['full_name' => 'Test Customer']);
    }

    public function test_customer_edit_updates_existing_record(): void
    {
        $customer = Customer::create(['full_name' => 'Original', 'email' => 'original@example.com']);

        $this->get(route('customers.edit', $customer))->assertOk()->assertSee('Original');
        $this->put(route('customers.update', $customer), [
            'full_name' => 'Updated Customer',
            'email' => 'updated@example.com',
        ])->assertRedirect(route('customers.index'));

        $this->assertDatabaseHas('customers', ['id' => $customer->id, 'full_name' => 'Updated Customer']);
    }

    public function test_user_creation_requires_unique_username_and_full_name(): void
    {
        User::create(['username' => 'existing_user', 'full_name' => 'Existing User']);

        $this->post(route('users.store'), ['username' => 'existing_user', 'full_name' => 'Another User'])
            ->assertSessionHasErrors('username');
        $this->post(route('users.store'), ['username' => 'brand_new', 'full_name' => ''])
            ->assertSessionHasErrors('full_name');

        $this->post(route('users.store'), ['username' => 'brand_new', 'full_name' => 'Brand New'])
            ->assertRedirect(route('users.index'));

        $this->assertDatabaseHas('users', ['username' => 'brand_new', 'full_name' => 'Brand New']);
    }

    public function test_user_can_edit_without_changing_own_username(): void
    {
        $user = User::create(['username' => 'keep_me', 'full_name' => 'Original Name']);
        $this->get(route('users.edit', $user))->assertOk()->assertSee('keep_me');

        $this->put(route('users.update', $user), [
            'username' => 'keep_me',
            'full_name' => 'Updated Name',
        ])->assertRedirect(route('users.index'));

        $this->assertDatabaseHas('users', ['id' => $user->id, 'full_name' => 'Updated Name']);
    }

    public function test_user_avatar_is_prepared_on_public_disk_and_only_its_path_is_saved(): void
    {
        Storage::fake('public');
        $user = User::create(['username' => 'avatar_user', 'full_name' => 'Avatar User']);

        $this->put(route('users.update', $user), [
            'username' => 'avatar_user',
            'full_name' => 'Avatar User',
            'avatar' => UploadedFile::fake()->image('profile.jpg', 800, 600)->size(100),
        ])->assertRedirect(route('users.index'));

        $path = $user->fresh()->avatar;
        $this->assertNotNull($path);
        $this->assertMatchesRegularExpression('/^avatars\/[0-9a-f-]+\.webp$/', $path);
        Storage::disk('public')->assertExists($path);
        $this->assertSame([360, 360], array_slice(getimagesize(Storage::disk('public')->path($path)), 0, 2));
        $this->get(route('users.index'))->assertSee('storage/' . $path);
    }

    public function test_non_image_and_oversized_avatar_files_are_rejected(): void
    {
        Storage::fake('public');
        $user = User::create(['username' => 'tester', 'full_name' => 'File Tester']);
        $base = ['username' => 'tester', 'full_name' => 'File Tester'];

        $this->put(route('users.update', $user), $base + [
            'avatar' => UploadedFile::fake()->create('notes.pdf', 100, 'application/pdf'),
        ])->assertSessionHasErrors('avatar');

        $this->put(route('users.update', $user), $base + [
            'avatar' => UploadedFile::fake()->image('large.jpg')->size(2049),
        ])->assertSessionHasErrors('avatar');

        $this->assertNull($user->fresh()->avatar);
    }

    public function test_placeholder_is_used_when_no_avatar_is_uploaded(): void
    {
        User::create(['username' => 'no_picture', 'full_name' => 'No Picture']);
        $this->get(route('users.index'))->assertOk()->assertSee('images/avatar-placeholder.svg');
    }
}
