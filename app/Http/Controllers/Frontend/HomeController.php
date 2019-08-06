<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use App\Repositories\NewsRepository;

class HomeController extends Controller
{
    protected $product_hot;
    protected $news_hot;

    public function __construct(ProductRepository $product_hot, NewsRepository $news_hot)
    {
        $this->product_hot = $product_hot;
        $this->news_hot = $news_hot;
    }

    public function index()
    {
        $products = $this->product_hot->listProductHot();
        $news = $this->news_hot->listNewsHot();

       return view('frontend.home.index', compact('products', 'news'));
    }
}
