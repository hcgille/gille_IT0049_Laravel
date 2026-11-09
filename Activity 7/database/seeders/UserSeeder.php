<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['username' => 'jreyes', 'full_name' => 'Julian Reyes'],
            ['username' => 'mdela_cruz', 'full_name' => 'Mika Dela Cruz'],
            ['username' => 'apascual', 'full_name' => 'Alyssa Pascual'],
            ['username' => 'rgarcia', 'full_name' => 'Rafael Garcia'],
            ['username' => 'kmendoza', 'full_name' => 'Katrina Mendoza'],
            ['username' => 'tlim', 'full_name' => 'Tristan Lim'],
        ];

        foreach ($users as $user) {
            User::query()->firstOrCreate(
                ['username' => $user['username']],
                ['full_name' => $user['full_name']]
            );
        }
    }
}
