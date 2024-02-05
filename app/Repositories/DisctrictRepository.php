<?php

namespace App\Repositories;

use App\Repositories\Interfaces\DisctrictRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Models\District;


/**
 * Class DictrictRepository
 * @package App\Repositories
 */
class DisctrictRepository extends BaseRepository implements DisctrictRepositoryInterface
 {
    protected $model;

    public function __construct(District $model)
    {
        $this -> model = $model;
    }

    public function findDistrictByProvinceId(int $province_id = 0){
        return $this->model->where('province_code', '=', $province_id)->get();
    }
 }
