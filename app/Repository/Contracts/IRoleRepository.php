<?php

namespace App\Repository\Contracts;

interface IRoleRepository extends IRepository
{
    public function queryRolesDatatable();
}
