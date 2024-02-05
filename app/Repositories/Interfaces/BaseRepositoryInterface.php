<?php

namespace App\Repositories\Interfaces;

/**
 * Interface DistricServiceInterface
 * @package App\Services\Interfaces
 */
interface BaseRepositoryInterface
{
    public function all();
    public function findById(int $id);
    public function create(array $payload);
    public function update(int $id = 0, array $payload = []);
    public function delete(int $id = 0);//thực hiện xóa mềm bản ghi
    public function forceDelete(int $id = 0);//thực hiện xóa cứng bản ghi
}
