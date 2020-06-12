<?php

namespace App\Repository\Classes;

use App\Models\User;
use App\Repository\Contracts\IUserRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends Repository implements IUserRepository
{
    protected function modelClass()
    {
        return User::class;
    }

    /**
     * @return Builder|Model
     */
    public function queryUsersDatatable()
    {
        return $this->model()->with('role')->orderBy('id', 'asc');
    }

    /**
     * @return int
     */
    public function countClients()
    {
        return $this->model()->where('role_id', 2)->count();
    }

    /**
     * @param string|null $keyword
     * @return Builder|Model
     */
    public function queryPublicClients(?string $keyword = null)
    {
        $query = $this->model()
            ->where('private', 0)
            ->where('role_id', 2);

        if($keyword !== null){
            $query = $query->where(function (Builder $query) use ($keyword){
                $query
                    ->where('name', 'LIKE', "%$keyword%")
                    ->orWhere('username', 'LIKE', "%$keyword%");
            });
        }

        return $query->orderBy('name', 'asc');
    }

    /**
     * @param string $username
     * @return Builder|Model
     */
    public function findClientByUsername(string $username)
    {
        return $this->model()
            ->where('username', $username)
            ->where('private', 0)
            ->where('role_id', 2)
            ->firstOrFail();
    }

    /**
     * @param int $id
     * @return Builder|Model
     */
    public function findClientById(int $id)
    {
        return $this->model()
            ->where('id', $id)
            ->where('private', 0)
            ->where('role_id', 2)
            ->firstOrFail();
    }
}
