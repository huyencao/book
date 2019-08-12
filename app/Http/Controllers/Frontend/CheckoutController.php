<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CheckoutRepository;
use App\Http\Requests\CheckoutRequest;
use Cart;
use Mail;
use App\Models\Product;

class CheckoutController extends Controller
{
    protected $checkout;

    public function __construct(CheckoutRepository $checkout)
    {
        $this->checkout = $checkout;
    }

    public function index()
    {
        $province = $this->checkout->listProvince();

        return view('frontend.order-cart.checkout', compact('province'));
    }

    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'fullname' => 'required|max:50|min:5',
            'phone' => 'required|max:12|min:10|regex:/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/',
            'email' => 'required|email|max:35|min:5',
            'province' => 'required',
            'district' => 'required',
            'payment_method' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('checkout')
                ->withErrors($validator)
                ->withInput();
        }

        $order_cart = Cart::content();
        $request->merge(
            [
                'order_cart' => $order_cart,
            ]
        );


        Mail::send('sendmail', array('name' => $request->fullname, 'email' => $request->email, 'phone' => $request->phone), function ($message) {
            $message->to('caohuyeenf1997@gmail.com', 'GCO Book')->subject('Visitor Feedback!');
        });

        Order::create($request->all());

        Cart::destroy();

        return redirect(route('home'))->with([
            'flash_level' => 'success',
            'flash_message' => 'Đặt hàng thành công!'
        ]);
    }

    public function district(Request $request)
    {
        $district = $this->checkout->listDistrict($request->province_id);
        foreach ($district as $value) {
            echo '<option value="' . $value->districtid . '">' . $value->name . '</option>';
        }
    }
}
