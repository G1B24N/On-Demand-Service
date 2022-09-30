<?php

namespace App\Http\Middleware;

use Closure;
use App\Order;

class Pesanan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $cekPesanan = Order::where('status',0)->get();
        
        if(count($cekPesanan) > 0){
            $cekPesanan = true; 
        }else{
            $cekPesanan = false;
        }
        
        $request->attributes->add(['cekPesanan' => $cekPesanan]);
        return $next($request);
    }
}
