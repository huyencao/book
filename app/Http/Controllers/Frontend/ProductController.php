<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use App\Repositories\CommentRepository;
use App\Repositories\ClassRoomRepository;
use App\Repositories\SubjectReposiory;

class ProductController extends Controller
{
    protected $product;
    protected $comment;
    protected $class_room;
    protected $subject;

    public function __construct(ProductRepository $product, CommentRepository $comment, ClassRoomRepository $class_room, SubjectReposiory $subject)
    {
        $this->product = $product;
        $this->comment = $comment;
        $this->class_room = $class_room;
        $this->subject = $subject;
    }

    public function index(Request $request)
    {
        $products = $this->product->listProduct($request->order);
        $list_class = $this->class_room->activeClassRoom();
        $list_subjects = $this->subject->activeSubject();

        return view('frontend.products.index', compact('products', 'list_class', 'list_subjects'));
    }

    public function detail($slug)
    {
        $data = $this->product->detailProduct($slug);
        $list_related = $this->product->listRelatedProducts($slug);

        $product_id = $data[0]->id;
        $list_comment = $this->comment->listComment($product_id);

        return view('frontend.products.detail', compact('data', 'list_related', 'list_comment'));
    }

    public function search(Request $request)
    {
        $list_class = $this->class_room->activeClassRoom();
        $list_subjects = $this->subject->activeSubject();

        $product = Product::query();

        if ($request->has('name')) {
            $product->where('name', 'LIKE', '%' . $request->name . '%');
        }
        if ($request->has('class')) {
            $product->orwhere('class_id', $request->class);
        }
        if ($request->has('subjects')) {
            $product->orwhere('subject_id', $request->subjects);
        }

        $results_search = $product->get();
        return view('frontend.products.search', compact('results_search', 'list_class', 'list_subjects'));
    }
}
