<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'role',
        'nama_depan',
        'nama_belakang',
        'image',
        'no_hp',
        'jenis_kelamin',
        'alamat',
        'kota',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function pesanan()
    {
         return $this->hasMany('App\Pesanan','user_id', 'id');
    }

    public function driver()
    {
        return $this->hasMany('App\Driver', 'user_id', 'id');
    }

    public function restaurant()
    {
        return $this->hasMany('App\Restaurant', 'id_user', 'id');
    }

    public function orderdoride()
    {
        return $this->hasMany('App\OrderDoride', 'id_user', 'id');
    }
}
