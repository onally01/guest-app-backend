<?php

// created by onally

namespace App\Repositories\Staff;

use App\Staff;
use Illuminate\Support\Carbon;

class StaffRepository implements StaffInterface
{

    protected $model;

    public function __construct(Staff $model)
    {
        $this->model = $model;
    }

    public function store($params)
    {
        // store new Staff
        $model = $this->model;
        $this->setModelProperties($model, $params);
        $model->save();
        return $model;
    }

    public function update($params)
    {
        // save Staff
        $model = $this->findById($params['id']);
        $this->setModelProperties($model, $params);
        $model->save();
        return $model;
    }



    public function findById($id)
    {
        // find Staff
        return $this->model::find($id);
    }


    public function getAll()
    {
        // get all Staff
        return $this->model;
    }

    public function delete($id)
    {
        // delete Staff
        $model = $this->findById($id);
        $model->delete();
        return 'Success';
    }

    private function setModelProperties($model, $params){
        // set Staff properties
        $model->name = $params['name'];
        $model->department_id = $params['department'];
    }

}

