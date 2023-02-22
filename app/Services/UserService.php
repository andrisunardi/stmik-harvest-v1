<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserService
{
    public $table = 'users';

    public $slug = 'user';

    public function add(array $data = []): User
    {
        $data['password'] = Hash::make($data['password']);

        $image = $data['image'];
        $imageName = Str::slug($data['name']).'-'.now()->format('Y-m-d-H-i-s');

        if ($image) {
            $data['image'] = "{$imageName}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        }

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return User::create($data)->assignRole($data['roles_id']);
    }

    public function clone(array $data, User $user): User
    {
        $data['password'] = Hash::make($data['password']);

        $image = $data['image'];
        $imageName = Str::slug($data['name']).'-'.now()->format('Y-m-d-H-i-s');

        if ($image) {
            $data['image'] = "{$imageName}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        } else {
            if ($user->checkImage()) {
                $data['image'] = "{$imageName}.".explode('.', $user->image)[1];

                File::copy(
                    public_path("images/{$this->slug}/{$user->image}"),
                    public_path("images/{$this->slug}/{$data['image']}"),
                );
            }
        }

        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return User::create($data)->assignRole($data['roles_id']);
    }

    public function edit(User $user, $data): User
    {
        $password = $data['password'] ?? null;

        if ($password) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $image = $data['image'];
        $imageName = Str::slug($data['name']).'-'.now()->format('Y-m-d-H-i-s');

        if ($image) {
            $user->deleteImage();

            $data['image'] = "{$imageName}.{$image->getClientOriginalExtension()}";
            $image->storePubliclyAs($this->slug, $data['image'], 'images');
        } else {
            unset($data['image']);
        }

        $user->update($data);
        $user->refresh();
        $user->syncRoles($data['roles_id']);

        return $user;
    }

    public function active(User $user): User
    {
        $user->is_active = ! $user->is_active;
        $user->save();
        $user->refresh();

        return $user;
    }

    public function deleteImage(User $user)
    {
        $user->deleteImage();

        $user->image = null;
        $user->save();
        $user->refresh();

        return $user;
    }

    public function delete(User $user): bool
    {
        return $user->delete();
    }

    public function deleteAll(array $users = []): bool
    {
        return User::when($users, fn ($q) => $q->whereIn('id', $users))->delete();
    }

    public function restore(User $user): bool
    {
        return $user->restore();
    }

    public function restoreAll(array $users = []): bool
    {
        return User::when($users, fn ($q) => $q->whereIn('id', $users))->onlyTrashed()->restore();
    }

    public function deletePermanent(User $user): bool
    {
        return $user->forceDelete();
    }

    public function deletePermanentAll(array $users = []): bool
    {
        return User::when($users, fn ($q) => $q->whereIn('id', $users))->onlyTrashed()->forceDelete();
    }

    public function editProfile(User $user, $data): User
    {
        $user->update($data);
        $user->refresh();

        return $user;
    }

    public function changePassword(User $user, $data)
    {
        $user->update(['password' => Hash::make($data['new_password'])]);
        $user->refresh();
    }

    public function resetPassword(User $user)
    {
        $password = Str::random(5);
        $user->update(['password' => Hash::make($password)]);
        $user->refresh();

        return $password;
    }
}
