<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	public $timestamps = false;
	
    public static function getProductAllImages($id){

    	return Image::where('images.gift_id', $id)
    					->leftJoin('gifts', 'gifts.id', '=', 'images.gift_id')
    					->leftJoin('gifts_sales', 'gifts_sales.gift_id','=','images.gift_id')
    					->select('gifts.id','gifts.name','gifts.description','gifts.price','gifts.image','images.image_1','images.image_2','images.image_3','gifts_sales.sale_price')
    					->get();
    }

    public static function createProductImages($id,$image_1,$image_2,$image_3){
    	$image = new Image;
    	$image->gift_id = $id;
    	$image->image_1 = $image_1;
    	$image->image_2 = $image_2;
    	$image->image_3 = $image_3;
    	$image->save();

    }
}
