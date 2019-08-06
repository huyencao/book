<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use App\Repositories\CateProductRepository;
use Auth;
use Hash;
use File;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    protected $product;
    protected $cate_product;

    public function __construct(ProductRepository $product, CateProductRepository $cate_product)
    {
        $this->product = $product;
        $this->cate_product = $cate_product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_product = $this->product->listProductAdmin();

        return view('backend.product.list', compact('list_product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate_product = $this->cate_product->listCateProduct();

        return view('backend.product.add', compact('cate_product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
        }
        if (!empty($request->file('fImage'))) {
            $file_name = $request->file('fImage')->getClientOriginalName();
            $image = 'uploads/product/' . time() . '-' . $file_name;
            $request->file('fImage')->move('uploads/news/', $image);
        }

        $request->merge(
            [
                'user_id' => $user->id,
                'slug' => str_slug($request->name),
                'thumbnail' => $image
            ]
        );

        $this->product->create($request->all());

        return redirect(route('product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->product->delete($id);

        return redirect(route('product.index'));
    }
}
