<?php

namespace App\Repositories;

use Carbon\Carbon;
use DB;
use App\Models\Employee;

class EmployeeRepository extends BaseRepository
{
    public function create($data)
    {
        return Employee::create($data);
    }
    public function update($data,$company)
    {
        $company->fill($data);
        $company->save();
        return $company;
    }
}