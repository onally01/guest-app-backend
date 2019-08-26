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

class StaffResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'department' => new DepartmentResource($this->department),
            'date' => Carbon::parse($this->created_at)->format('d M Y')
        ];
    }
}
