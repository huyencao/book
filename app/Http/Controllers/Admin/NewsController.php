<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\NewsRepository;
use App\Repositories\CateNewRepository;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\EditNewsRequest;
use Auth;
use Hash;
use File;

class NewsController extends Controller
{
    protected $list_news;
    protected $cate_news;

    public function __construct(NewsRepository $list_news, CateNewRepository $cate_news)
    {
        $this->list_news = $list_news;
        $this->cate_news = $cate_news;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_news = $this->list_news->listNewsAdmin();

        return view('backend.news.list', compact('list_news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_cate = $this->cate_news->listCateNews();

        return view('backend.news.add', compact('list_cate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
        }
        if (!empty($request->file('fImage'))) {
            $file_name = $request->file('fImage')->getClientOriginalName();
            $image = 'uploads/news/' . time() . '-' . $file_name;
            $request->file('fImage')->move('uploads/news/', $image);
        }

        $request->merge(
            [
                'user_id' => $user->id,
                'slug' => str_slug($request->title),
                'thumbnail' => $image
            ]
        );

        $this->list_news->create($request->all());

        return redirect(route('news.index'));
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
        $list_cate = $this->cate_news->listCateNews();
        $news = $this->list_news->findNews($id);

        return view('backend.news.edit', compact('list_cate', 'news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditNewsRequest $request, $id)
    {
        if (Auth::check()) {
            $user = Auth::user();
        }
        $request->merge(
            [
                'user_id' => $user->id
            ]
        );
        $this->list_news->update($id, $request->all());

        return redirect(route('news.index'));
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
            $this->list_news->delete($id);

            return redirect(route('news.index'));
        } catch (ModelNotFoundException $ex) {
            return $ex->getMessage();
        }
    }
}
