<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gift;
use App\Order;
use Mail;
class OrdersController extends Controller
{
	public function createOrder(Request $request){

        $validatedData = $request->validate([
            'city'              => 'required',
            'email'             => 'required|email',
            'address'           => 'required',
            'last_name'         => 'required',
            'first_name'        => 'required',
            'phone_number'      => 'required',
            'paymenth_method'   => 'required',
        ]);

        
        $data            = $request->toArray();
        $keys            = json_decode($data['keys']);
        $giftIds         = array();
        $giftsOrderCount = array();
        $totalPrice = 0;
        foreach($keys as $key => $value ){
                $giftIds[$value->id] = $value->id;
                $giftsOrderCount[$value->id] = $value->count;
         }
        $giftIds = array_values($giftIds);
        $gifts = Gift::whereIn('gifts.id',$giftIds)->select('gifts.id','.gifts.price','gifts.image','gifts.name','gifts_sales.sale_price')->leftJoin('gifts_sales', 'gifts_sales.gift_id', '=', 'gifts.id')->get();
        foreach ($gifts->toArray() as $key => $value) {
        	if($value['sale_price'] != null )$value['price'] = $value['sale_price']? : $value['price'];
            $totalPrice += $giftsOrderCount[$value['id']] * $value['price'];
            Order::newOrder($value['id'],$giftsOrderCount[$value['id']],$data,$totalPrice);
        }
        $this->newOrderEmailNotify($data,$gifts,$giftsOrderCount,$totalPrice);

        return redirect('/');
    }

    public function newOrderEmailNotify($data,$gifts,$giftsOrderCount,$totalPrice){

    	
    		$message = [
    		'first_name' => $data['first_name'],
    		'fullAddress' =>  "Քաղաք ". $data['city']. " ".$data['address'],
    		'phone_number' => $data['phone_number'],
    		'gifts' => $gifts,
    		'count' => $giftsOrderCount,
    		'totalPrice' => $totalPrice,

    		];
 
    	    Mail::send('emails.newOrder', ['data' => $message], function ($m) use ($message) {
            $m->from('test.laravel.360@gmail.com', 'Gift Gallery');

            $m->to('test.laravel.360@gmail.com', 'dfsfsdfsdfsd')->subject('Ձեր պատվերը հաջողությամբ գրանցվել է');
        });
    }
}
