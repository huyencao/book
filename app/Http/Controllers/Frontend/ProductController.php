<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use App\Repositories\CommentRepository;

class ProductController extends Controller
{
    protected $product;
    protected $comment;

    public function __construct(ProductRepository $product, CommentRepository $comment)
    {
        $this->product = $product;
        $this->comment = $comment;
    }

    public function index()
    {
        $products = $this->product->listProduct();
        $list_class = $this->product->listClass();
        $list_subjects = $this->product->listSubject();

        return view('frontend.products.index', compact('products', 'list_class', 'list_subjects'));
    }

    public function detail($slug)
    {
        $data = $this->product->detailProduct($slug);
        $list_related = $this->product->listRelatedProducts($slug);
        $list_comment = $this->comment->listComment();

        return view('frontend.products.detail', compact('data', 'list_related', 'list_comment'));
    }

    public function search(Request $request)
    {

        $list_class = $this->product->listClass();
        $list_subjects = $this->product->listSubject();


        $product = Product::query();

        if ($request->has('name')) {
            $product->where('name', 'LIKE', '%' . $request->name . '%');
        }
        if ($request->has('class')) {
            $product->orwhere('class', $request->class);
        }
        if ($request->has('subjects')) {
            $product->orwhere('subjects', $request->subjects);
        }

        $results_search = $product->get();

        return view('frontend.products.search', compact('results_search', 'list_class', 'list_subjects'));
    }
}
