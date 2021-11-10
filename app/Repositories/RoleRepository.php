<?php


namespace App\Repositories;
use App\Models\Role;

class RoleRepository
{
    public function getAllRoles()
    {
        return Role::all();
    }

    public function findRoleByName($name)
    {
        return Role::where('name', $name)->first();
    }
}
