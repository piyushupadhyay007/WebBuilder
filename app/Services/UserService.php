<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class UserService
{
    public function getAllUsers()
    {
        return Cache::remember('users_all', 600, function () {
            return User::all();
        });
    }

    public function getUserById($id)
    {
        return Cache::remember("user_{$id}", 600, function () use ($id) {
            return User::findOrFail($id);
        });
    }

    public function createUser(array $data)
    {
        return User::create($data);
    }

    public function updateUser($id, array $data)
    {
        $user = User::findOrFail($id);
        $user->update($data);
        Cache::forget("user_{$id}");
        return $user;
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        Cache::forget("user_{$id}");
        return true;
    }
}
