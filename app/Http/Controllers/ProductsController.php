<?php

namespace App\Http\Controllers;
use App\Products;
use App\Cart;
use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use Stripe\Charge;
use Stripe\Stripe;

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
		//dd($request->session()->get('cart'));
		return redirect()->route('product.index');
	}

	public function getShoppingCart(){
		if (!Session::has('cart')){
			return view ('shop.shopping_cart');
		}
		$oldcart = Session::get('cart');
		$cart = new Cart($oldcart);
		return view('shop.shopping_cart',['products'=>$cart->items, 'totalPrice'=> $cart->totalPrice]);
	}
    
    public function getCheckout(){
    	if (!Session::has('cart')){
			return view ('shop.shopping_cart');
		}
		$oldcart = Session::get('cart');
		$cart = new Cart($oldcart);
		$total = $cart->totalPrice;
		return view('shop.checkout',['total' => $total]);
    }

    public function postCheckout(Request $request){
    	if (!Session::has('cart')){
			return redirect()->route('shop.shoppingCart');
		}
		$oldcart = Session::get('cart');
		$cart = new Cart($oldcart);
		
		Stripe::setApiKey('sk_test_eapgZnwoNpejCBuE1AYzAqjz');
		try {
			Charge::create(array(
				"amount" => $cart->totalPrice * 100, // Amount in cents
			    "currency" => "usd",
			    "source" => $request->input('stripeToken'),
			    "description" => "Test charge"
			    ));
			} catch(\Exception $e) {
			  // The card has been declined
				return redirect()->route('checkout')->with('error', $e->getMessage());
			}

			Session::forget('cart');
			return redirect()->route('product.index')->with('success','Successfully purchased products');

	}
    
}
