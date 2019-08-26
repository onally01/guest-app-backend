<?php

// created by onally

namespace App\Repositories\Department;

use App\Department;
use Illuminate\Support\Carbon;

class DepartmentRepository implements DepartmentInterface
{

    protected $model;

    public function __construct(Department $model)
    {
        $this->model = $model;
    }

    public function store($params)
    {
        // store new department
        $model = $this->model;
        $this->setModelProperties($model, $params);
        $model->save();
        return $model;
    }

    public function update($params)
    {
        // save department
        $model = $this->findById($params['id']);
        $this->setModelProperties($model, $params);
        $model->save();
        return $model;
    }



    public function findById($id)
    {
        // find department
        return $this->model::find($id);
    }


    public function getAll()
    {
        // get all department
        return $this->model;
    }

    public function delete($id)
    {
        // delete department
        $model = $this->findById($id);
        $model->delete();
        return 'Success';
    }

    private function setModelProperties($model, $params){
        // set department properties
        $model->name = $params['name'];
    }

}

