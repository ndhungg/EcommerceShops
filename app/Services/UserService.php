<?php

namespace App\Services;

use App\Services\Interfaces\UserServiceInterface;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserService
 * @package App\Services
 */
class UserService implements UserServiceInterface
{
   protected $userRepository;
   public function __construct(UserRepository $userRepository)
   {
      $this->userRepository = $userRepository;
   }

   public function paginate($request)
   {
      $condition['keywords'] = addslashes($request->input('keywords'));
      $perPage =  intval($request->input('perpage'));
      $users = $this->userRepository->pagination(
         $this->paginateSeleted(),
         $condition,
         [],
         $perPage,
         ['path' => 'user/index']
      );
      return $users;
   }

   public function create($request)
   {
      DB::beginTransaction();
      try {
         $payload = $request->except(['_token', 'send', 're_password']);
         $carbonDate = Carbon::createFromFormat('Y-m-d', $payload['birthday']);
         $payload['birthday'] = $carbonDate->format('Y-m-d H:i:s');
         $payload['password'] = Hash::make($payload['password']);

         $user = $this->userRepository->create($payload);

         DB::commit();
         return true;
      } catch (\Exception $e) {
         DB::rollBack();
         echo "Error: " . $e->getMessage();
         die();
         return false;
      }
   }

   public function update($id, $request)
   {
      DB::beginTransaction();
      try {
         $payload = $request->except(['_token', 'send', 're_password']);
         $payload['birthday'] = $this->convertBirthDate($payload['birthday']);
         $user = $this->userRepository->update($id, $payload);

         DB::commit();
         return true;
      } catch (\Exception $e) {
         DB::rollBack();
         echo "Error: " . $e->getMessage();
         die();
         return false;
      }
   }

   public function destroy($id)
   {
      DB::beginTransaction();
      try {
         $user = $this->userRepository->delete($id);
         DB::commit();
         return true;
      } catch (\Exception $e) {
         DB::rollBack();
         echo "Error: " . $e->getMessage();
         die();
         return false;
      }
   }


   private function convertBirthDate($birthday = '')
   {
      $carbonDate = Carbon::createFromFormat('Y-m-d', $birthday);
      $birthday = $carbonDate->format('Y-m-d H:i:s');
      return $birthday;
   }

   private function paginateSeleted()
   {
      return [
         'id',
         'name',
         'email',
         'phone',
         'address',
         'publish',
      ];
   }


   public function updateStatus($post = [])
   {
      DB::beginTransaction();
      try {
         $payload[$post['field']] = (($post['value'] == 1)?0:1);
         $user = $this->userRepository->update($post['modelId'], $payload);
         
         DB::commit();
         return true;
      } catch (\Exception $e) {
         DB::rollBack();
         echo "Error: " . $e->getMessage();
         die();
         return false;
      }
   }

   public function updateStatusAll($post){
      DB::beginTransaction();
      try{
          $payload[$post['field']] = $post['value'];
          $flag = $this->userRepository->updateByWhereIn('id', $post['id'], $payload);

          DB::commit();
          return true;
      }catch(\Exception $e ){
          DB::rollBack();
          // Log::error($e->getMessage());
          echo $e->getMessage();die();
          return false;
      }
  }


}
