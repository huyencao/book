<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CateProductRequest;
use App\Http\Requests\EditCateProductRequest;
use App\Repositories\CateProductRepository;
use Auth;

class CateProductController extends Controller
{
    protected $cate_product;

    public function __construct(CateProductRepository $cate_product)
    {
        $this->cate_product = $cate_product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cate_product = $this->cate_product->listCateProductAdmin();

        return view('backend.cate-product.list', compact('cate_product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate_parent = $this->cate_product->listCateParent();

        return view('backend.cate-product.add', compact('cate_parent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CateProductRequest $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
        }
        $request->merge(
            [
                'slug' => str_slug($request->title),
                'user_id' => $user->id
            ]
        );
        $this->cate_product->create($request->all());

        return redirect()->route('cate-product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $category_product = $this->cate_product->findCate($id);
            $cate_parent = $this->cate_product->listCateParent();

            return view('backend.cate-product.edit', compact('category_product', 'cate_parent'));

        } catch (ModelNotFoundException $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCateProductRequest $request, $id)
    {
        if (Auth::check()) {
            $user = Auth::user();
        }
        $request->merge(
            [
                'user_id' => $user->id
            ]
        );

        return redirect(route('cate-product.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->cate_product->delete($id);

            return redirect(route('cate-product.index'));
        } catch (ModelNotFoundException $ex) {
            return $ex->getMessage();
        }
    }
}
