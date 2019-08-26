<?php
/**
 * Created by PhpStorm.
 * User: onally
 * Date: 8/23/19
 * Time: 8:44 AM
 */

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class GuestResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'staff' => new StaffResource($this->staff),
            'mobile' => $this->mobile,
            'email' => $this->email,
            'purpose' => $this->purpose,
            'time_in' => $this->time_in,
            'time_out' => $this->time_out,
            'date' => Carbon::parse($this->created_at)->format('d M Y')
        ];
    }
}
