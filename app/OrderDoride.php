<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDoride extends Model
{
    protected $table = 'tbl_order_dorides';

    protected $fillable = [
    'user',
    'driver',
    'lokasi_awal',
    'tujuan',
    'jarak',
    'harga',
    'durasi',
    'status',
    ];
    
    public function user()
	{
        return $this->belongsTo('App\User','user', 'id');
	}

    public function driver()
	{
        return $this->belongsTo('App\Driver','driver', 'id');
	}
}
