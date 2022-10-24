<?php

namespace App\Http\Traits;

trait departmentTrait
{
    private function findDepartment($department_id)
    {
        return $this->departmentModel::find($department_id);
    }

    private function setSessionFlash($key, $value)
    {
        session()->flash($key,$value);
    }

}
