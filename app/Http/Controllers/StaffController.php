<?php

namespace App\Http\Controllers;

use App\Http\Resources\StaffResource;
use App\Repositories\Staff\StaffInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $staff;
    public function __construct(StaffInterface $staff)
    {
        $this->staff = $staff;
    }

    /**
     * Display all staff.
     *
     */
    public function index()
    {
         $data = $this->staff->getAll()->latest()->get();;
        return $this->collection($data);
    }


    /**
     * Store a new staff.
     */
    public function store(Request $request)
    {
        $params = $request->all();


        $validator = $this->validateField($params);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $this->staff->store($params);
        return $this->index();
    }

    /**
     * Update staff.
     *
     */
    public function update(Request $request)
    {
        $params = $request->all();


        $validator = $this->validateField($params);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $this->staff->update($params);
        return $this->index();
    }

    /**
     * Delete a staff.
     *
     */
    public function delete(Request $request)
    {
        $this->staff->delete($request->id);
        return $this->index();
    }

    public function validateField($request){
        return Validator::make($request,
            [
                'name' => 'required',
                'department' => 'required',
            ]);
    }

    private function collection($data){
        return StaffResource::collection($data);
    }
}
