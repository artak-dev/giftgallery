<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Gift;
use App\Image;
use App\Order;
class AdminController extends Controller
{


    public function login(){
    	return view('admin.login');
    }

    public function adminLogin(Request $request){

     $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect('admin/home');
        }
    }

    public function home(){
    	$categorys = DB::table('gifts_category')->get();
    	return view('admin.home',[ 'categorys' => $categorys]);
    }

    public function createPost(Request $request){

    	 $validatedData = $request->validate([
            'product_name'        => 'required',
            'product_description' => 'required',
            'product_type'        => 'required',
            'product_price'       => 'required',
            'product_image'       => 'required',
            'product_image_1'     => 'required',
            'product_image_2'     => 'required',
            'product_image_2'     => 'required',
            'product_image_3'     => 'required',
        ]);
        $image   = date('mdYHis').uniqid().'.'.$request->product_image->extension();  
        $image_1 = date('mdYHis').uniqid().'.'.$request->product_image_1->extension();  
        $image_2 = date('mdYHis').uniqid().'.'.$request->product_image_2->extension();  
        $image_3 = date('mdYHis').uniqid().'.'.$request->product_image_3->extension();  
   
       if($request->product_image->move(public_path('assets/images/products'), $image)){
       		if($request->product_image_1->move(public_path('assets/images/products'), $image_1)){
       			if($request->product_image_2->move(public_path('assets/images/products'), $image_2)){
	       			if($request->product_image_3->move(public_path('assets/images/products'), $image_3)){
	       				$gift_id = Gift::createNewPost($request->all(),$image);
	       				Image::createProductImages($gift_id,$image_1,$image_2,$image_3);
	       				return redirect('admin/home');
	       			}
       			}
  			}
       }

    	
    }

    public function showAllNewOrders(Request $request) {
    	$orders = Order::getNewOrders();
    	foreach ($orders as $key => &$value) {
    		$value['info'] = $value['first_name']. " ".$value['last_name']."<br>".$value['phone_number']."<br>".$value['city']." ".$value['address'];
    		$value['image'] = "<img src=".asset('assets/images/products/'.$value['image'])." height=60>";
    		if($value['paymenth'] == 1){ $value['paymenth'] = 'Կանխիկ';	}
    		if($value['paymenth'] == 2){ $value['paymenth'] =  'Իդրամ';	}
    		if($value['paymenth'] == 3){ $value['paymenth'] = 'Բանկային Քարտով';}
    		if($value['status']   == 0){ $value['status'] = "<h5 data-key=$value->id class='ready-to-ship change-order-status'>Պատրաստ է առաքման</h5>";}
    	}
    	echo json_encode($orders->toArray());
    }


    public function showAllreadyToShippOrders(Request $request){
    	$orders = Order::getReadyToShippOrders();
    	foreach ($orders as $key => &$value) {
    		$value['info'] = $value['first_name']. " ".$value['last_name']."<br>".$value['phone_number']."<br>".$value['city']." ".$value['address'];
    		$value['image'] = "<img src=".asset('assets/images/products/'.$value['image'])." height=60>";
    		if($value['paymenth'] == 1){ $value['paymenth'] = 'Կանխիկ';	}
    		if($value['paymenth'] == 2){ $value['paymenth'] =  'Իդրամ';	}
    		if($value['paymenth'] == 3){ $value['paymenth'] = 'Բանկային Քարտով';}
    		if($value['status']   == 1){ $value['status'] = "<h5 data-key=$value->id class='waiting-for-shipping-btn'>Առաքվում է</h5><br><h5 data-key=$value->id class='shipped-btn change-order-status' data-status = 1>Առաքված է</h5>";}
    	}
    	echo json_encode($orders->toArray());
    }


    public function changeOrderStatus(Request $request){
    	$validatedData = $request->validate([
            'id'       => 'required',
        ]);
    	dd($request->all());
        if($request->status != null){
    		Order::changeOrderStatus($request->id,1);
        }else if ((int)$request->status == 1){
    		Order::changeOrderStatus($request->id,2);
        }    

    } 
}
