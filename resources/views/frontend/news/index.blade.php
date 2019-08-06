@extends('frontend.layouts.master')

@section('content')
    <main>
        <section id="breadcrumd">
            <div class="container">
                <div class="content">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="">Trang chủ</a></li>
                        <li class="list-inline-item"><span>Tin tức</span></li>
                    </ul>
                </div>
            </div>
        </section>
        <section id="news">
            <div class="container">
                <div class="content">
                    <div class="title-info-cate">
                        <h1>Tin tức</h1>
                    </div>
                    <div class="list-news list-cate-new">
                        <ul>
                            @if (!empty($list_news))
                                @foreach ($list_news as $news)
                                    <li>
                                        <div class="item">
                                            <div class="avarta"><a href="/news-detail/{{ $news->slug }}"><img
                                                        src="{{ asset('frontend/images/new-hot.png') }}"
                                                        class="img-fluid"
                                                        alt=""></a></div>
                                            <div class="info">
                                                <div class="date">
                                                    <span>{{ date('d-m-Y', strtotime($news->updated_at)) }}</span></div>
                                                <h3><a href="/news-detail/{{ $news->slug }}">{{ $news->title  }}</a></h3>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    {{ $list_news->links() }}
                </div>
            </div>
        </section>
    </main>
@endsection
