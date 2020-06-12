<?php

namespace App\Repository\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface IUserRepository extends IRepository
{
    /**
     * @return Builder|Model
     */
    public function queryUsersDatatable();

    /**
     * @return int
     */
    public function countClients();

    /**
     * @param string|null $keyword
     * @return Builder|Model
     */
    public function queryPublicClients(?string $keyword = null);

    /**
     * @param string $username
     * @return Builder|Model
     */
    public function findClientByUsername(string $username);

    /**
     * @param int $id
     * @return Builder|Model
     */
    public function findClientById(int $id);
}
