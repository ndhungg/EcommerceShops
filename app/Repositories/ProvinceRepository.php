<?php

namespace App\Repositories;

use App\Models\Province;
use App\Repositories\Interfaces\ProvinceRepositoryInterface;

/**
 * Class ProvinceRepository
 * @package App\Repositories
 */
class ProvinceRepository implements ProvinceRepositoryInterface
{
    public function all(){
        return Province::all();
    }
}
