<?php

namespace App\Repositories\AdminUser;

use App\Models\AdminUser;
use App\Http\Resources\UserResource;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Repositories\AdminUser\AdminUserInterface as UserInterface;

class EloquentAdminUserRepository extends BaseRepository implements AdminUserInterface
{
    public $model;

    // set the protect model to the admin user
    // this will be used in the repository
    function __construct(AdminUser $model) {
        $this->model = $model;
    }

    /**
     * Create something new!
     * @param  array  $attributes [description]
     * @return [type]             [description]
     */
    public function create(array $attributes)
    {

        try{
            
            $user = $this->model->create([
                'first_name' => $attributes['first_name'],
                'last_name' => $attributes['last_name'],
                'email' => $attributes['email'],
                'password' => $attributes['password']
            ]);

            $user->syncRoles($attributes['role']['id']);            

        } catch(\Exception $e){
            return response()->error($e->getMessage());
        }

        return response()->success('Your record has been created');
    }

    /**
     * Update the model
     * @param  [type] $id         [description]
     * @param  array  $attributes [description]
     * @return [type]             [description]
     */
    public function update($id, array $attributes)
    {
        try{

        	$user = $this->model->find($id);

          $user->update($attributes);
          
          if(isset($attributes['password'])){
              $user->password = Hash::make($attributes['password']);
              $user->save();
          }

        } catch(\Exception $e){
            return response()->error($e->getMessage());
        }

        try {
            $user->syncRoles($attributes['role']['id']);
        } catch(\Exception $e){
            return response()->error($e->getMessage());
        }


        return response()->success('Your record has been updated');
    }

    /**
     * DESTROY ALL HUMANS!!!!
     * @param  array  $attributes [description]
     * @return [type]             [description]
     */
    public function destroy(array $attributes)
    {
        // let's see if the array has one item
        if(count($attributes['id']) === 1){
            // if does, let's check if it is the original, one account
            if($attributes['id'][0] === 1){
                // it is! you can't delete it SUCKA!
                return response()->error('You Cannot Delete The Original Account');
            }
        }

        // let's go through the array of id's and delete them
        foreach($attributes['id'] AS $attribute => $value){
            // check if its the super admin account
            if($this->model->isSuperAdmin($value)){
                continue;
            }            

            $this->model->delete($value);

        }

        // everything is fine, carry on sir!
        return response()->success('Your records has been deleted');
    }


}
