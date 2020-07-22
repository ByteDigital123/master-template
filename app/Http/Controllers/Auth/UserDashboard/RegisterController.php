<?php

namespace App\Http\Controllers\Auth\UserDashboard;

use App\Http\Controllers\Controller;
use App\Notifications\User\EmailConfirmation;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Services\AddressService;
use App\Services\UserService;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    /**
     * @var AddressService
     */
    private $addressService;
    /**
     * @var UserService
     */
    private $userService;

    /**
     * Create a new controller instance.
     *
     * @param AddressService $addressService
     * @param UserService $userService
     */
    public function __construct(
        AddressService $addressService,
        UserService $userService
    ){
        $this->middleware('guest');
        $this->addressService = $addressService;
        $this->userService = $userService;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request)
    {
        $attributes = $request->all();

        DB::transaction(function() use($attributes){

            if(isset($attributes['address'])){
                $address = $this->addressService->store($attributes['address']);
            }

            $user = $this->userService->store([
                'first_name' => $attributes['first_name'],
                'last_name' => $attributes['last_name'],
                'username' => $attributes['username'],
                'date_of_birth' => $attributes['date_of_birth'],
                'address_id' => isset($address) ? $address->id : null,
                'password' => Hash::make($attributes['password']),
                'email' => $attributes['email'],
            ]);

            $user->notify(new EmailConfirmation($user));

        }, 5);


        return response()->success('This action has been completed successfully');

    }
}
