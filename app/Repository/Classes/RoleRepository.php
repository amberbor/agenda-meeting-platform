<?php

namespace App\Repository\Classes;

use App\Models\Role;
use App\Repository\Contracts\IRoleRepository;

class RoleRepository extends Repository implements IRoleRepository
{
    protected function modelClass()
    {
        return Role::class;
    }

    public function queryRolesDatatable()
    {
        return $this->model()->orderBy('id', 'asc');
    }
}
