<?php
namespace App\Traits;

use App\Models\Role;
use App\Models\Permission;

trait HasRoles
{
    public function roles() {
        return $this->belongsToMany(Role::class,'users_roles', 'user_id', 'role_id');
    }

    public function hasRole(... $roles) {
        foreach ($roles as $role) {
            if ($this->roles->contains('slug', $role)) {
                return true;
            }
        }
        return false;
    }
}
