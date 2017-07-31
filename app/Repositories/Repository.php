<?php

namespace App\Repositories;


use App\Repositories\Exceptions\WrongRepositoryModelException;
use App\Repositories\Interfaces\RepositoryInterface;
use Barryvdh\Debugbar\Middleware\Debugbar;
use DebugBar\DebugBarException;
use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Model;

abstract class Repository implements RepositoryInterface
{
    private $app;

    protected $model;

    function __construct(App $app)
    {
        $this->app = $app;
        $this->make_model();
    }

    /**
     * Specify Model class name
     * @return string $model_class_name
     */
    abstract public function model ();

    protected function make_model ()
    {
        $model = $this->app->make( $this->model() );

        if( ! $model instanceof Model )
        {
            throw new WrongRepositoryModelException( $this->model() .' is not a valid Model for '. __CLASS__ );
        }

        $this->model = $model;
    }

    public function all($columns = ['*'])
    {
        return $this->model->get( $columns );
    }

    public function paginate($perPage = 15, $columns = ['*'])
    {
        return $this->model->paginate( $perPage, $columns );
    }

    public function create(array $data)
    {
        return $this->model->create( $data );
    }

    public function update(array $data, $id, $attribute = 'id' )
    {
        return $this->model->where( $attribute, '=', $id )->update( $data );
    }

    public function delete($id)
    {
        return $this->model->destroy( $id );
    }

    public function find($id, $columns = ['*'])
    {
        return $this->model->find( $id, $columns );
    }

    public function where($field, $value, $columns = ['*'])
    {
        return $this->model->where( $field, '=', $value )->get( $columns );
    }

    public function with(...$relations)
    {
        $this->model = $this->model->with( ...$relations );
        return $this;
    }
}