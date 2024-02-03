<?php

namespace App\Repositories;

use App\Models\District;
use App\Repositories\Interfaces\DistrictRepositoryInterface;

/**
 * Class DistricRepository
 * @package App\Repositories
 */
class DistrictRepository implements DistrictRepositoryInterface
{
    public function all(){
        return District::all();
    }
}
