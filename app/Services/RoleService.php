<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleService
{
    public $table = 'roles';

    public $slug = 'role';

    public function add(array $data = []): Role
    {
        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Role::create($data)->givePermissionTo($data['permissions_id']);
    }

    public function clone(array $data, Role $role): Role
    {
        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Role::create($data)->givePermissionTo($data['permissions_id']);
    }

    public function edit(Role $role, $data): Role
    {
        $role->update($data);
        $role->refresh();
        $role->syncPermissions($data['permissions_id']);

        return $role;
    }

    public function active(Role $role): Role
    {
        $role->is_active = ! $role->is_active;
        $role->save();
        $role->refresh();

        return $role;
    }

    public function delete(Role $role): bool
    {
        return $role->delete();
    }

    public function deleteAll(array $roles = []): bool
    {
        return Role::when($roles, fn ($q) => $q->whereIn('id', $roles))->delete();
    }

    public function restore(Role $role): bool
    {
        return $role->restore();
    }

    public function restoreAll(array $roles = []): bool
    {
        return Role::when($roles, fn ($q) => $q->whereIn('id', $roles))->onlyTrashed()->restore();
    }

    public function deletePermanent(Role $role): bool
    {
        return $role->forceDelete();
    }

    public function deletePermanentAll(array $roles = []): bool
    {
        return Role::when($roles, fn ($q) => $q->whereIn('id', $roles))->onlyTrashed()->forceDelete();
    }
}
