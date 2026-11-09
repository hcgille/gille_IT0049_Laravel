<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\AvatarService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Throwable;

class UserController extends Controller
{
    public function index(Request $request): View
    {
        $search = trim((string) $request->query('search', ''));

        $users = User::query()
            ->when($search !== '', fn ($query) => $query->where(function ($q) use ($search) {
                $q->where('username', 'like', '%' . $search . '%')
                    ->orWhere('full_name', 'like', '%' . $search . '%');
            }))
            ->orderBy('full_name')
            ->get();

        return view('users.index', [
            'users' => $users,
            'search' => $search,
            'totalUsers' => User::query()->count(),
            'withAvatars' => User::query()->whereNotNull('avatar')->count(),
        ]);
    }

    public function create(): View
    {
        return view('users.create');
    }

    public function store(Request $request): RedirectResponse
    {
        // Username is unique and required. Full name is required.
        // Per the activity, avatar uploads are available on the edit form only.
        $validated = $request->validate([
            'username' => ['required', 'string', 'max:80', 'alpha_dash', Rule::unique('users', 'username')],
            'full_name' => ['required', 'string', 'max:150'],
        ]);

        User::query()->create($validated);

        return redirect()->route('users.index')
            ->with('success', 'User account created successfully. You can now add an avatar from Edit.');
    }

    public function edit(User $user): View
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user, AvatarService $avatars): RedirectResponse
    {
        $validated = $request->validate([
            'username' => [
                'required', 'string', 'max:80', 'alpha_dash',
                Rule::unique('users', 'username')->ignore($user->id),
            ],
            'full_name' => ['required', 'string', 'max:150'],
            // TFA7: image only, maximum 2MB (2048 KB).
            'avatar' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:2048'],
        ]);

        unset($validated['avatar']);
        $previousAvatar = $user->avatar;
        $newAvatar = null;

        if ($request->hasFile('avatar')) {
            // Uploaded original is read, processed and never saved publicly.
            $newAvatar = $avatars->prepare($request->file('avatar'));
            $validated['avatar'] = $newAvatar;
        }

        try {
            $user->update($validated);
        } catch (Throwable $exception) {
            // Do not leave behind a new file if the database update failed.
            if ($newAvatar !== null) {
                Storage::disk('public')->delete($newAvatar);
            }
            throw $exception;
        }

        if ($newAvatar !== null && $previousAvatar !== null) {
            Storage::disk('public')->delete($previousAvatar);
        }

        return redirect()->route('users.index')
            ->with('success', 'User account updated successfully.');
    }
}
