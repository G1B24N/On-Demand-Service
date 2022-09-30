<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $table = 'tbl_drivers';

    protected $fillable = [
        'id',
        'user_id',
        'nik',
        'sim',
        'nama_driver',
        'alamat',
        'ttl',
        'nama_motor',
        'foto_motor',
        'foto_driver',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function order()
    {
        return $this->hasMany('App\OrderDoride', 'driver', 'id');
    }
    
}
