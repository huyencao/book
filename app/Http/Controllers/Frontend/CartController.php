<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::content();

        return view('frontend.order-cart.cart', compact('cart'));
    }

    public function cart(Request $request)
    {
        $product_id = $request->product_id;
        $product = Product::find($product_id);
        $price = empty($product->price_new) ? $product->price_old : $product->price_new;
        Cart::add(array('id' => $product_id, 'name' => $product->name, 'qty' => 1, 'price' => $price));

        Cart::content();

        return redirect()->route('cart');
    }

    public function update(Request $request)
    {
        $rowId = $request->rowId;
        $qty = $request->qty;
        Cart::update($rowId, $qty);
    }

    public function delete($rowId)
    {
        Cart::remove($rowId);

        return redirect()->back()->with('message', 'Delete cart');;
    }

    public function district(Request $request){

    }


}
