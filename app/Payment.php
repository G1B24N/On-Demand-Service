<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'tbl_payments';

    protected $fillable = [
        'metode_pembayaran'
    ];

    
}
