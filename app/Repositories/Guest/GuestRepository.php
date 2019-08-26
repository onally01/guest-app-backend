<?php

// created by onally

namespace App\Repositories\Guest;

use App\Guest;
use Illuminate\Support\Carbon;

class GuestRepository implements GuestInterface
{

    protected $model;

    public function __construct(Guest $model)
    {
        $this->model = $model;
    }

    public function store($params)
    {
        // store new Guest
        $model = $this->model;
        $this->setModelProperties($model, $params);
        $model->save();
    }

    public function update($params)
    {
        // update Guest
        $model = $this->findById($params['id']);
        $this->setModelProperties($model, $params);
        $model->save();
    }

    public function timeOut($id)
    {
        // update Guest
        $model = $this->findById($id);
        $model->time_out = Carbon::now()->format('H:i:s');
        $model->save();
    }



    public function findById($id)
    {
        // find Guest by id
        return $this->model::find($id);
    }


    public function getAll()
    {
        // get all Guest
        return $this->model;
    }

    public function delete($id)
    {
        // delete Guest
        $model = $this->findById($id);
        $model->delete();
    }

    private function setModelProperties($model, $params){
        // set Guest properties
        $model->name = $params['name'];
        $model->staff_id = $params['staff'];
        $model->purpose = $params['purpose'];
        $model->email = $params['email'] ?? '';
        $model->mobile = $params['mobile'] ?? '';
        $model->time_in = Carbon::now()->format('H:i:s');
    }

}

