<?php

namespace App\Repositories;

use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use App\Models\Base;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class DictrictRepository
 * @package App\Repositories
 */
 class BaseRepository  implements BaseRepositoryInterface
 {
    protected $model;

    public function __construct( Model $model ){
        $this ->model = $model;
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
                    $query->where('name', 'LIKE', '%'.$condition['keywords'].'%');
                }
       });
        if(!empty($join)){
            $query->join(...$join);
        }
        return $query->paginate($perPage)
                     ->withQueryString()->withPath(env('APP_URL').$extend['path']);
    }

    public function all(){
        return $this->model->all();
    }

    public function create(array $payload = []){
        $model = $this->model->create($payload);
        return $model ->fresh();
   }

    public function update(int $id = 0,array $payload = []){
         $model = $this->findById($id);
         return $model->update($payload);
    }

    public function updateByWhereIn(string $whererInField, array $whereIn = [], array $payload = []){
        return $this->model->whereIn($whererInField, $whereIn)->update($payload);
    }


    public function delete(int $id = 0){
       return $this->findById($id)->delete();
   }


   public function forceDelete(int $id = 0){
    return $this->findById($id)->forceDelete();
}

    public function findById(
        int $modelId, 
        array $column = ['*'],
        array $relation = []
    ){
        return $this->model
                ->select($column)
                ->with($relation)
                ->findOrFail($modelId);
    }

 }
