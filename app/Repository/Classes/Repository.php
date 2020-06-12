<?php

namespace App\Repository\Classes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Foundation\Application as App;
use App\Repository\Contracts\IRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection as CollectionSupport;
use Illuminate\Database\Eloquent\Collection;
use Exception;

abstract class Repository implements IRepository
{
    /**
     * @var App
     */
    private $app;

    /**
     * @var Model
     */
    private $model;

    /**
     * @param App $app
     * @throws Exception
     */
    public function __construct(App $app)
    {
        $this->app = $app;
        $this->modelInstance();
    }

    /**
     * @return mixed
     */
    abstract protected function modelClass();

    /**
     * @return Model|Builder
     */
    public function model()
    {
        return $this->model;
    }

    /**
     * @return void
     * @throws Exception
     */
    private function modelInstance()
    {
        $model = $this->app->make($this->modelClass());

        if (!$model instanceof Model){
            throw new Exception("Class {$this->modelClass()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        $this->model = $model;
    }

    /**
     * @return Builder
     */
    public function query()
    {
        return $this->model()->query();
    }

    /**
     * @param  array|mixed  $columns
     * @return Collection|static[]
     */
    public function all($columns = ['*'])
    {
        return $this->model()->all($columns);
    }

    /**
     * @param array $attributes
     * @return Model|Builder
     */
    public function create(array $attributes)
    {
        return $this->model()->create($attributes);
    }

    /**
     * @param array $data
     * @param $id
     * @param string $attribute
     * @return int|mixed
     */
    public function update(array $data, $id, $attribute = "id")
    {
        return $this->model()->where($attribute, '=', $id)->update($data);
    }

    /**
     * @param CollectionSupport|array|int $ids
     * @return int
     */
    public function destroy($ids)
    {
        return $this->model()->destroy($ids);
    }

    /**
     * @param  mixed  $id
     * @param  array  $columns
     * @return Model|Collection|static[]|static|null
     */
    public function find($id, array $columns = ['*'])
    {
        return $this->model()->find($id, $columns);
    }

    /**
     * @param mixed $id
     * @param array $columns
     * @return Model|Collection|static|static[]
     *
     * @throws ModelNotFoundException
     */
    public function findOrFail($id, array $columns = ['*'])
    {
        return $this->model()->findOrFail($id, $columns);
    }

    /**
     * @param $attribute
     * @param $value
     * @param array $columns
     * @return Builder|Model|object|null
     */
    public function findBy($attribute, $value, array $columns = ['*'])
    {
        return $this->model()->where($attribute, '=', $value)->first($columns);
    }
}
