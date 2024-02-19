<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\BaseRepository;

/**
 * Class UserRepository
 * @package App\Repositories
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $model;

    public function __construct(User $model)
    {
        $this -> model = $model;
    }

    public function pagination(
        array $column = ['*'],
        array $condition = [],
        array $join = [],
        int $perPage = 1,
        array $extend = [],
    ){
        $query = $this->model->select($column)->where(function ($query) use ($condition){
            if(isset($condition['keywords']) && !empty($condition['keywords'])){
                    $query->where('name', 'LIKE', '%'.$condition['keywords'].'%')
                    ->orWhere('phone', 'LIKE', '%'.$condition['keywords'].'%')
                    ->orWhere('address', 'LIKE', '%'.$condition['keywords'].'%')
                    ->orWhere('email', 'LIKE', '%'.$condition['keywords'].'%');
                }
       });
        if(!empty($join)){
            $query->join(...$join);
        }
        return $query->paginate($perPage)
                     ->withQueryString()->withPath(env('APP_URL').$extend['path']);
    }
    
}
