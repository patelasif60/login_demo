<?php

namespace App\Services;

use App\Repositories\EmployeeRepository;
use File;
use Storage;

/**
 * Company class to handle operator interactions.
 */
class EmployeeService
{

    public function __construct(EmployeeRepository $repository)
    {
        $this->repository = $repository;
    }
    public function create($data)
    {
        return $this->repository->create($data);
    }
    public function update($data,$company)
    {
        return $this->repository->update($data,$company);
    }
}