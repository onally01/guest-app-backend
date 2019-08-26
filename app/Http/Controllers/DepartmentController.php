<?php

namespace App\Http\Controllers;

use App\Http\Resources\DepartmentResource;
use App\Repositories\Department\DepartmentInterface;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $department;
    public function __construct(DepartmentInterface $department)
    {
        $this->department = $department;
    }

    /**
     * Display all department.
     *
     */
    public function index()
    {
        $data = $this->department->getAll()->latest()->get();

        return DepartmentResource::collection($data);
    }


    /**
     * Store a new department.
     */
    public function store(Request $request)
    {
        $params = $request->all();
        $this->department->store($params);
        return $this->index();
    }

    /**
     * Update department.
     *
     */
    public function update(Request $request)
    {
        $params = $request->all();
        $this->department->update($params);
        return $this->index();
    }

    /**
     * Delete a department.
     *
     */
    public function delete(Request $request)
    {
        $this->department->delete($request->id);

        return $this->index();
    }

}
