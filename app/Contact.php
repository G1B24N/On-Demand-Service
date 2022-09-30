<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'tbl_contacts';

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'email',
        'phone_number',
        'msg_subject',
        'message',
        
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
