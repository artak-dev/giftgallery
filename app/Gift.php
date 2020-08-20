<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Gift extends Model
{

    public static function getAllProductsWithCategoryNames($filter = false, $skip, $category_id= 0 ){
		if(!$filter && $category_id == 0){
			return Gift::Join('gifts_category', 'gifts.category_id', '=', 'gifts_category.id')
						->leftJoin('gifts_sales', 'gifts_sales.gift_id', '=', 'gifts.id')
			 			->select('gifts.id','gifts.name','gifts.category_id','gifts.description','gifts.price','gifts.image','gifts_category.class_name','gifts_sales.sale_price','gifts_sales.date as sale_end', DB::Raw('IFNULL( `gifts_sales`.`sale_price` , gifts.price ) as current_price'))
			 			->skip($skip)->take(8)
						->get();
		}else if (!$filter && $category_id != 0){
		 	return Gift::Join('gifts_category', 'gifts.category_id', '=', 'gifts_category.id')
						->leftJoin('gifts_sales', 'gifts_sales.gift_id', '=', 'gifts.id')
			 			->select('gifts.id','gifts.name','gifts.category_id','gifts.description','gifts.price','gifts.image','gifts_category.class_name','gifts_sales.sale_price','gifts_sales.date as sale_end', DB::Raw('IFNULL( `gifts_sales`.`sale_price` , gifts.price ) as current_price'))
			 			->where('gifts_category.id',$category_id)
			 			->skip($skip)->take(8)
						->get();

		}else{
			return Gift::Join('gifts_category', 'gifts.category_id', '=', 'gifts_category.id')
					->leftJoin('gifts_sales', 'gifts_sales.gift_id', '=', 'gifts.id')
			 		->select('gifts.id','gifts.name','gifts.category_id','gifts.description','gifts.price','gifts.image','gifts_category.class_name','gifts_sales.sale_price','gifts_sales.date as sale_end', DB::Raw('IFNULL( `gifts_sales`.`sale_price` , gifts.price ) as current_price'))
			 		->skip($skip)->take(8)
					->get();
				}
    	
    }
    public static function getAllSaleGifts(){
    	return Gift::Join('gifts_sales', 'gifts_sales.gift_id', '=', 'gifts.id')
		 			->select('gifts.id','gifts.name','gifts.category_id','gifts.description','gifts.price','gifts.image','gifts_sales.sale_price','gifts_sales.date as sale_end')
		 			->orderBy('gifts.id',"DESC")
					->get();
    }

    public static function SaleFilter($data){
    	$query = "SELECT gifts.name, gifts.price, gifts_category.name categoryName, gifts.id, gifts.image, gifts_sales.sale_price  FROM gifts JOIN gifts_sales ON gifts_sales.gift_id = gifts.id JOIN gifts_category ON gifts_category.id = gifts.category_id" ;
       	if( ($data['gender'] != 0)){
    		 $query = $query." WHERE gifts.category_id = ".$data['gender'];
    	}
       	if($data['filterbyPrice'] == 0) {
    		 $query = $query." ORDER BY gifts.id DESC";
    	}       	
    	if( (int) $data['filterbyPrice'] == 2) {
    		 $query = $query." ORDER BY gifts_sales.sale_price ASC";
    	}       	
    	if((int) $data['filterbyPrice'] == 1) {
    		 $query = $query." ORDER BY gifts_sales.sale_price DESC ";
    	}
    	
    	return DB::select($query);
    }

    public static function getAllMensGifts(){

    	return Gift::Join('gifts_category','gifts_category.id','gifts.category_id')
    			->LeftJoin('gifts_sales','gifts_sales.gift_id','gifts.id')
    			->where('gifts.category_id','1')
    			->orderBy('gifts.price','ASC')
    			->get();
    }

    public static function getAllWomansGifts(){

    	return Gift::Join('gifts_category','gifts_category.id','gifts.category_id')
    			->LeftJoin('gifts_sales','gifts_sales.gift_id','gifts.id')
    			->where('gifts.category_id','2')
    			->get();
    }    

    public static function getAllOfficeGifts(){

    	return Gift::Join('gifts_category','gifts_category.id','gifts.category_id')
    			->LeftJoin('gifts_sales','gifts_sales.gift_id','gifts.id')
    			->where('gifts.category_id','3')
    			->get();
    }   

     public static function getAllAnimalsGifts(){

    	return Gift::Join('gifts_category','gifts_category.id','gifts.category_id')
    			->LeftJoin('gifts_sales','gifts_sales.gift_id','gifts.id')
    			->where('gifts.category_id','4')
    			->get();
    }     
    public static function getAllChildrensGifts(){

    	return Gift::Join('gifts_category','gifts_category.id','gifts.category_id')
    			->LeftJoin('gifts_sales','gifts_sales.gift_id','gifts.id')
                ->select('gifts_category.name as product_name', 'gifts_category.class_name','gifts.*', 'gifts_sales.sale_price', 'gifts_sales.date',DB::Raw('IFNULL( `gifts_sales`.`sale_price` , gifts.price ) as currentPrice'))
    			->where('gifts.category_id','5')
    			->skip(0)->take(8)
    			->get();
    }


    public static function createNewPost($data,$image){
        $gift = new Gift;
        $gift->name = trim($data['product_name']);
        $gift->description = trim($data['product_description']);
        $gift->category_id = trim($data['product_type']);
        $gift->price = trim($data['product_price']);
        $gift->image = trim($image);
        $gift->save();
        return $gift->id;

    }

}
