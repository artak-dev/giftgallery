<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public static function newOrder($gift_id,$count,$data,$totalPrice){
    	$Order = new Order;
    	$Order->gift_id = $gift_id;
    	$Order->first_name = $data['first_name'];
    	$Order->last_name = $data['last_name'];
    	$Order->city = $data['city'];
    	// $Order->billing_state = $data['billing_state'];
    	$Order->address = $data['address'];
    	$Order->phone_number = $data['phone_number'];
    	// $Order->postal_code = $data['postal_code'];
    	$Order->email = $data['email'];
    	$Order->notes = $data['notes'];
    	$Order->paymenth = $data['paymenth_method'];
        $Order->paymenth_price = $totalPrice;
    	$Order->status = 0;
    	$Order->count = $count;
    	$Order->save();
    }

    public static function getNewOrders(){
        return Order::Join('gifts','gifts.id','orders.gift_id')
                ->select('orders.id','orders.first_name','orders.last_name','orders.city','orders.address','orders.phone_number','orders.email','orders.paymenth','orders.paymenth_price','orders.status','orders.count','gifts.name','gifts.image','gifts.price')
                ->where('orders.status',0)
                ->get();
    }

    public static function changeOrderStatus($id,$status){
        $order = Order::find($id);
        $order->status = $status;
        $order->save();

    }

    public static function getReadyToShippOrders(){
        return Order::Join('gifts','gifts.id','orders.gift_id')
                ->where('orders.status',1)
                ->get();
    }
}
