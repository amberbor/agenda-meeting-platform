<?php

namespace App\Repository\Contracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;
use Illuminate\Support\Collection as CollectionSupport;

interface IRepository
{
    /**
     * @return Model|Builder
     */
    public function model();

    /**
     * @return Builder
     */
    public function query();

    /**
     * @param  array|mixed  $columns
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all($columns = ['*']);

    /**
     * @param array $attributes
     * @return Model|Builder
     */
    public function create(array $attributes);

    /**
     * @param array $data
     * @param $id
     * @param string $attribute
     * @return int|mixed
     */
    public function update(array $data, $id, $attribute = "id");

    /**
     * @param CollectionSupport|array|int $ids
     * @return int
     */
    public function destroy($ids);

    /**
     * @param  mixed  $id
     * @param  array  $columns
     * @return Model|\Illuminate\Database\Eloquent\Collection|static[]|static|null
     */
    public function find($id, array $columns = ['*']);

    /**
     * @param mixed $id
     * @param array $columns
     * @return Model|\Illuminate\Database\Eloquent\Collection|static|static[]
     *
     * @throws ModelNotFoundException
     */
    public function findOrFail($id, array $columns = ['*']);

    /**
     * @param $attribute
     * @param $value
     * @param array $columns
     * @return Builder|Model|object|null
     */
    public function findBy($attribute, $value, array $columns = ['*']);
}
