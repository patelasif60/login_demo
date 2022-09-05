<?php

namespace App\Repositories;

use Carbon\Carbon;
use DB;
use App\Models\Company;

class CompanyRepository extends BaseRepository
{
    public function create($data)
    {
        return Company::create($data);
    }
    public function update($data,$company)
    {
        $company->fill($data);
        $company->save();
        return $company;
    }
}