<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gift;
use App\Order;
use DB;
class ProductsController extends Controller
{


    public function details($id){
    	
    	$gift = gift::getProductById($id);
    	return view('productDetails', [ 'gift' => $gift ] );

    }

    public function shop(){
    	var_dump('expression');die;
    }

    public function giftset(){
        return view('productDetails');
    }

    public function checkout(Request $request){

        return view('checkout');
    }

    public function home()
    {
       $skip = 0;
       $gifts = Gift::getAllProductsWithCategoryNames(false, $skip);
       $categorys = DB::table('gifts_category')->get();

       return view('home', [ 
                        'gifts' => $gifts->toArray(),
                        'categorys' => $categorys->toArray()
        ] );
    }

    public function sale (){
        $gifts = Gift::getAllSaleGifts();

        return view('sale',[  'gifts' => $gifts->toArray()]);
    }

    public function mens (){

        $gifts = Gift::getAllMensGifts();

        return view('mens', ['gifts' => $gifts->toArray()]);
    }

    public function womans(){

        $gifts = Gift::getAllWomansGifts();

        return view ('womans', ['gifts' => $gifts->toArray()] );
    }    

    public function office(){

        $gifts = Gift::getAllOfficeGifts();

        return view ('office', ['gifts' => $gifts->toArray()] );
    }    

    public function giftsForAnimals(){

        $gifts = Gift::getAllAnimalsGifts();

        return view ('animals', ['gifts' => $gifts->toArray()] );
    }
    
    public function giftsForChildrens(){

        $gifts = Gift::getAllChildrensGifts();

        return view ('childrens', ['gifts' => $gifts->toArray()] );
    }

}
