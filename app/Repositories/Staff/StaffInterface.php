<?php
/**
 * Created by PhpStorm.
 * User: onally
 * Date: 8/21/19
 * Time: 1:32 PM
 */

namespace App\Repositories\Staff;

interface StaffInterface
{
    public function store($params);

    public function update($params);

    public function findById($id);

    public function getAll();

    public function delete($id);
}
