<?php

namespace App\Repositories\Interfaces;

/**
 * Interface DisctrictRepositoryInterface
 * @package App\Services\Interfaces
 */
interface DisctrictRepositoryInterface
{
    public function all();
    public function findDistrictByProvinceId(int $province_id);
}
