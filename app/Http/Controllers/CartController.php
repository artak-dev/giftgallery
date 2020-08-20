<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gift;
class CartController extends Controller
{
 
 	public function viewCart(Request $request){

 		return view('viewCart');
 	}

 	public function getAllProductsOnCart(Request $request){
 	    $validatedData = $request->validate([
        	'keys' => 'required',
    	]);
 		
 		$giftIds = json_decode($request->post('keys'));
 		$gifts = Gift::whereIn('id',$giftIds)->get();
 		echo json_encode($gifts);
 	}
}
