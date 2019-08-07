<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use App\Repositories\CateProductRepository;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\EditProductRequest;
use Auth;
use Hash;
use File;

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
            $request->file('fImage')->move('uploads/product/', $image);
        }
        if ($request->sale != 0) {
            $price_new = $request->price_old - ($request->price_old * $request->sale) / 100;
        } else {
            $price_new = 0;
        }

        $request->merge(
            [
                'user_id' => $user->id,
                'slug' => str_slug($request->name),
                'thumbnail' => !empty($image) == true ? $image : null,
                'price_new' => $price_new
            ]
        );
        $this->product->create($request->all());

        return redirect(route('product.index'))->with([
            'flash_level' => 'success',
            'flash_message' => 'Thêm thành công !'
        ]);
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
        $product = $this->product->findProduct($id);
        $cate_product = $this->cate_product->listCateProductOpen();

        return view('backend.product.edit', compact('product', 'cate_product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductRequest $request, $id)
    {
        if (Auth::check()) {
            $user = Auth::user();
        }
        $product = $this->product->findProduct($id);

        if (!empty($request->file('fImage'))) {
            $image = $product->thumbnail;
            $file_name      = $request->file('fImage')->getClientOriginalName();
            $thumbnail    = 'uploads/product/'.time().'-'.$file_name;
            $request->file('fImage')->move('uploads/product/', $thumbnail);
            if(File::exists($image)){
                File::delete($image);
            }
        }

        $sale = $product->sale;
        if ($request->sale == 0)
        {
            $price_new = 0;
        } elseif ($request->sale == $sale){
            $price_new = $product->price_new;
        } else
        {
            $price_new = $request->price_old - ($request->price_old * $request->sale) / 100;
        }

        if (empty($thumbnail)){
            $image_product = $product->thumbnail;
        } else
        {
            $image_product = $thumbnail;
        }

        $request->merge(
            [
                'user_id' => $user->id,
                'thumbnail' => $image_product,
                'price_new' => $price_new
            ]
        );

        $this->product->update($id, $request->all());

        return redirect()->route('product.index')->with([
            'flash_level' => 'success',
            'flash_message' => 'Cập nhật thành công !'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->product->findProduct($id);
        if (isset($product)) {
            $image = $product->thumbnail;
            if(File::exists($image)){
                File::delete($image);
            }
            $this->product->delete($id);
        }
        return back()->with([
            'flash_level' => 'success',
            'flash_message' => 'Xóa thành công !'
        ]);
    }
}
