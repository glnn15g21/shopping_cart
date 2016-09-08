<?php

namespace App\Http\Controllers;
use App\Products;
use App\Cart;
use Illuminate\Http\Request;

use App\Http\Requests;
use Session;

class ProductsController extends Controller
{
	public function getIndex(){
		$products = Products::all();
    	return view('shop.index',['products'=>$products]);
	}

	public function getAddToCart(Request $request, $id){
		$product = Products::find($id);
		$oldCart = Session::has('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);
		$cart->add($product, $product->id);

		$request->session()->put('cart',$cart);
		dd($request->session()->get('cart'));
		return redirect()->route('product.index');
	}
    
}
