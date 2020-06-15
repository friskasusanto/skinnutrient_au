<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Role;
use App\Regencies;
use App\Districts;
use App\Villages;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
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
    protected $redirectTo = '/login';
    // RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $status = 200;
        $message = "Berhasil";
        $village = $data['village'];
        $regency = $data['regency'];

        $user = User::create([
            'name' => $data['name'],
            'nama_belakang' => $data['nama_belakang'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'provinsi_id' => $data['state'],
            'kabupaten_id' => $data['city'],
            'kota_id' => $data['regency'],
            'kelurahan_id' => $data['village'],
            'address' => $data['address'],
            'password' => bcrypt($data['password']),
        ]);

        if ($village == NULL || $village == '-- Pilih Kelurahan/Desa --'){
            $user = User::create([
            'name' => $data['name'],
            'nama_belakang' => $data['nama_belakang'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'provinsi_id' => $data['state'],
            'kabupaten_id' => $data['city'],
            'kota_id' => $data['regency'],
            'kelurahan_id' => NULL,
            'address' => $data['address'],
            'password' => bcrypt($data['password']),
        ]);
        } 
        if ($regency == NULL || $regency == '-- Pilih Kota --'){
            $user = User::create([
            'name' => $data['name'],
            'nama_belakang' => $data['nama_belakang'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'provinsi_id' => $data['state'],
            'kabupaten_id' => $data['city'],
            'kota_id' => NULL,
            'kelurahan_id' => NULL,
            'address' => $data['address'],
            'password' => bcrypt($data['password']),
        ]);
        }
        // dd($user);
        $role = Role::where('name','=','Member')->first();
        $user->attachRole($role);

        return $user;
    }
    public function regencies($id)
    {
        $cities = Regencies::where('province_id', $id)->pluck('name','id');
        return json_encode($cities);
    }
    public function districts($id)
    {
        $cities = Regencies::find($id);
        $district = Districts::where('regency_id', $cities->id)->pluck('name','id');
        return json_encode($district);
    }
    public function villages($id)
    {
        $district = Districts::find($id);
        $villages = Villages::where('district_id', $district->id)->pluck('name','id');
        return json_encode($villages);
    }

    
}