<?php

namespace FJR\repositories;

use FJR\database\DatabaseManager;
use FJR\repositories\contracts\IRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements IRepository
{

    /**
     * @var Illuminate\Support\Facades\App;
     */
    private $app;

    /**
     * @var
     */
    protected $model;

    /**
     * @param App $app
     * @throws App\Exceptions\Handler as HandlerException
     */

    public function __construct(App $app, DatabaseManager $datasbase)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /* Create model instance
     * @return Model
     * @throws ModelNotFoundException
     */
    public function makeModel()
    {
        $model = $this->app::make($this->model());

        if (!$model instanceof Model) {
            echo "Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model";
        }
        return $this->model = $model;
    }

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    abstract public function model();


    /** Get all data
     * @param array $columns
     * @return mixed
     */
    public function getAll($columns = array('*'))
    {
        return $this->model->get($columns);
    }


    /** Get a record by id
     * @param $id
     * @return mixed
     */

    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }



    /**
     * Get a record by any column 
     * @param array $columnsData
     * @return mixed
     */

    public function where($columnsData)
    {
        return $this->model->where($columnsData)->get();
    }
}
