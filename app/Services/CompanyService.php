<?php

namespace App\Services;

use App\Repositories\CompanyRepository;
use File;
use Storage;
use Image;

/**
 * Company class to handle operator interactions.
 */
class CompanyService
{

    public function __construct(CompanyRepository $repository)
    {
        $this->repository = $repository;
        $this->logoPath = '/company/';
    }
    public function create($data)
    {
        if (isset($data['logo'])) {
            $logo = uploadImageToLocal($data['logo'], $this->logoPath);
            $data['logo'] = $logo['url'];
            $data['logo_file_name'] = $logo['file_name'];
        } else {
            $data['logo'] = null;
            $data['logo_file_name'] = null;
        }
        return $this->repository->create($data);
    }
    public function update($data,$company)
    {
        $disk = Storage::disk('public');
        if (isset($data['logo'])) {
            $existingLogo = $this->logoPath.$company->logo_file_name;
            $disk->delete($existingLogo);
            $logo = uploadImageToLocal($data['logo'], $this->logoPath);
            $data['logo'] = $logo['url'];
            $data['logo_file_name'] = $logo['file_name'];
        } else {
            $data['logo'] = $company->logo;
            $data['logo_file_name'] = $company->logo_file_name;
        }
        return $this->repository->update($data,$company);
    }
    public function deleteLogo($company)
    {
        $disk = Storage::disk('public');
        $logo = $this->logoPath.$company->logo_file_name;
        return $disk->delete($logo);
    }
}