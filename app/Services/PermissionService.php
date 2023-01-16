<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionService
{
    public $table = 'permissions';

    public function add(array $data = []): Permission
    {
        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Permission::create($data)->assignRole($data['roles_id']);
    }

    public function clone(array $data, Permission $permission): Permission
    {
        DB::statement(DB::raw("ALTER TABLE {$this->table} AUTO_INCREMENT = 1"));

        return Permission::create($data)->assignRole($data['roles_id']);
    }

    public function edit(Permission $permission, $data): Permission
    {
        $permission->update($data);
        $permission->refresh();
        $permission->syncRoles($data['roles_id']);

        return $permission;
    }

    public function active(Permission $permission): Permission
    {
        $permission->is_active = ! $permission->is_active;
        $permission->save();
        $permission->refresh();

        return $permission;
    }

    public function delete(Permission $permission): bool
    {
        return $permission->delete();
    }

    public function deleteAll(array $permissions = []): bool
    {
        return Permission::when($permissions, fn ($q) => $q->whereIn('id', $permissions))->delete();
    }

    public function restore(Permission $permission): bool
    {
        return $permission->restore();
    }

    public function restoreAll(array $permissions = []): bool
    {
        return Permission::when($permissions, fn ($q) => $q->whereIn('id', $permissions))->onlyTrashed()->restore();
    }

    public function deletePermanent(Permission $permission): bool
    {
        return $permission->forceDelete();
    }

    public function deletePermanentAll(array $permissions = []): bool
    {
        return Permission::when($permissions, fn ($q) => $q->whereIn('id', $permissions))->onlyTrashed()->forceDelete();
    }
}
