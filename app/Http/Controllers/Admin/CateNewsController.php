<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CateNewRepository;
use App\Http\Requests\CateNewsRequest;
use App\Http\Requests\CateNewsEditRequest;
use Auth;

class CateNewsController extends Controller
{
    protected $cate_news;

    public function __construct(CateNewRepository $cate_news)
    {
        $this->cate_news = $cate_news;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cate_news = $this->cate_news->listCateNews();

        return view('backend.cate-news.list', compact('cate_news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate_parent = $this->cate_news->listCateParent();

        return view('backend.cate-news.add', compact('cate_parent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CateNewsRequest $request)
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
        $this->cate_news->create($request->all());

        return redirect()->route('cate-news.index');
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
        try {
            $category_news = $this->cate_news->findCate($id);
            $cate_parent = $this->cate_news->listCateParent();

            return view('backend.cate-news.edit', compact('category_news','cate_parent'));

        } catch (ModelNotFoundException $ex) {
            return $ex->getMessage();
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CateNewsEditRequest $request, $id)
    {
        if (Auth::check()) {
        $user = Auth::user();
    }
        $request->merge(
            [
                'user_id' => $user->id
            ]
        );

        try {
            $this->cate_news->update($id, $request->all());

            return redirect(route('cate-news.index'));
        } catch (ModelNotFoundException $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->cate_news->delete($id);

            return redirect(route('cate-news.index'));
        } catch (ModelNotFoundException $ex) {
            return $ex->getMessage();
        }
    }
}
