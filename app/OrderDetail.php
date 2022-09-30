<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{

	protected $table = 'tbl_pesanan_details';

    protected $fillable = [
        'barang_id',
		'pesanan_id',
		'jumlah',
		'jumlah_harga',
		'metode_pembayaran',
		'id_restoran',
    ];

    public function barang()
	{
	      return $this->belongsTo('App\Product','barang_id', 'id');
	}

	public function pesanan()
	{
	      return $this->belongsTo('App\Order','pesanan_id', 'id');
	}

	public function payment()
	{
	      return $this->belongsTo('App\Payment','metode_pembayaran', 'id');
	}

	public function restaurant()
	{
	      return $this->belongsTo('App\Restaurant','id_restoran', 'id_restoran');
	}
}
