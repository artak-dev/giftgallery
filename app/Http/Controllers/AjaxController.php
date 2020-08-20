<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Gift;
use App\Image;
// use Request;
class AjaxController extends Controller
{
    public function getProductAllImages(Request $request){

    	 $validatedData = $request->validate([
        	'id' => 'required',
    	]);
    	$data = Image::getProductAllImages($request->input('id'))[0];
        if($data['sale_price'] != null )$data['old_price'] = $data['price']; $data['price'] = $data['sale_price']? : $data['price'];
    	echo json_encode($data);
    }

    public function productsFilter(Request $request){
        $validatedData = $request->validate([
            'orderBy' => 'required',
            'skip'    => 'required',
        ]);
    	$gifts = Gift::getAllProductsWithCategoryNames($request->input('orderBy'),$request->input('skip'));
    	echo json_encode($gifts);
    }

    public function loadMore(Request $request){
          $validatedData = $request->validate([
            'key'              => 'required',
            ]);

        $skip = $request->post('key');
        $category_id = $request->post('category_id');
        $data = Gift::getAllProductsWithCategoryNames(false , $skip,$category_id);
        echo json_encode($data);
    }

    public function saleFilter(Request $request){

        $filteredGifts = Gift::SaleFilter($request->all());
        echo json_encode($filteredGifts);
    }

}
