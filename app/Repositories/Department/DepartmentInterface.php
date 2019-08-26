<?php
/**
 * Created by PhpStorm.
 * User: onally
 * Date: 8/21/19
 * Time: 1:27 PM
 */

namespace App\Repositories\Department;

interface DepartmentInterface
{
    public function store($params);

    public function update($params);

    public function findById($id);

    public function getAll();

    public function delete($id);
}
