<?php

namespace App\Http\Controllers;

use App\Http\Resources\GuestResource;
use App\Repositories\Guest\GuestInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GuestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $guest;

    public function __construct(GuestInterface $guest)
    {
        $this->guest = $guest;
    }

    /**
     * Display all guests.
     *
     */
    public function index()
    {
        $data = $this->guest->getAll()->latest()->get();
        return $this->collection($data);
    }


    /**
     * Store a new guest.
     */
    public function store(Request $request)
    {

        $params = $request->all();

        $validator = $this->validateField($params);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $this->guest->store($params);

        return $this->index();
    }

    public function validateField($request){
        return Validator::make($request,
            [
                'name' => 'required',
                'staff' => 'required',
                'purpose' => 'required',
                'email' => 'nullable|email',
                'mobile' => 'nullable|numeric',
            ]);
    }

    /**
     * Update guest.
     *
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
        ]);
        $params = $request->all();

        // validate input field
        $validator = $this->validateField($params);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $this->guest->update($params);

        return $this->index();
    }

    public function timeOut(Request $request){
        $this->guest->timeOut($request->id);
        return $this->index();
    }

    /**
     * Delete a guesslog.
     *
     */
    public function delete(Request $request)
    {
        $this->guest->delete($request->id);
        return $this->index();
    }

    private function collection($data){
        return (GuestResource::collection($data));
    }
}
