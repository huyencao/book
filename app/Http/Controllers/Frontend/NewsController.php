<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\NewsRepository;

class NewsController extends Controller
{
    protected $news;

    public function __construct(NewsRepository $news)
    {
        $this->news = $news;
    }

     public function index()
    {
        $list_news = $this->news->listNews();
        return view('frontend.news.index', compact('list_news'));
    }

    public function detail($slug)
    {
        $data = $this->news->detailNews($slug);
        $news_hot = $this->news->listNewsHot();

    	return view('frontend.news.detail', compact('data', 'news_hot'));
    }
}
