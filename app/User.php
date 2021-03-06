<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use App\Role;


class User extends Authenticatable implements MustVerifyEmail
{
    use LaratrustUserTrait;
    use Notifiable; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'store_name', 'address', 'phone', 'deposit', 'nama_belakang', 'provinsi_id', 'kabupaten_id', 'kota_id', 'kelurahan_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function is_dropship(){
        return $this->hasRole('Dropshiper');
    }

    /**
    * 
    * 
    **/
    public function is_admin(){
        return $this->hasRole('Admin');
    }

    /**
    * 
    * 
    **/
    public function is_member(){
        return $this->hasRole('Member');
    }
}
