<?php

namespace App\Http\Controllers;
use App\Products;
use Illuminate\Http\Request;

use App\Http\Requests;

class ProductsController extends Controller
{
	public function getIndex(){
		$products = Products::all();
    	return view('shop.index',['products'=>$products]);
	}
    
}
