<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    protected $product;
    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $products = $this->product->listProduct();

        return view('frontend.products.index', compact('products'));
    }

    public function detail($slug)
    {
        $data = $this->product->detailProduct($slug);
        $list_related = $this->product->listRelatedProducts($slug);

        return view('frontend.products.detail', compact('data', 'list_related'));
    }
}
