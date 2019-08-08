@extends('frontend.layouts.master')

@section('content')
    <main>
        <section id="breadcrumd">
            <div class="container">
                <div class="content">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="  ">Trang chủ</a></li>
                        <li class="list-inline-item"><a href="">Tin tức</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <section id="new-detail">
            <div class="container">
                <div class="content">
                    <div class="title-info-cate">
                        @foreach ($data as $item)
                            <h1>{{ empty($item->title) == true ? '' : $item->title }}</h1>
                            <div class="date">
                                <span>{{ date('d-m-Y', strtotime($item->updated_at)) }}</span>
                            </div>
                            <div class="like-share">
                                <ul class="list-inline">
                                    <li class="list-inline-item"><a href=""><img src="{{ asset('public/frontend/images/like.png') }}" class="img-fluid"
                                                                                 alt=""></a></li>
                                    <li class="list-inline-item"><a href=""><img src="{{ asset('public/frontend/images/share.png') }}"
                                                                                 class="img-fluid" alt=""></a></li>
                                </ul>
                            </div>
                            <div class="sabo">
                                <h2>{!! empty($item->description) == true ? '' : $item->description !!}</h2>
                            </div>
                            <div class="content-detail">
                                <p>{!! empty($item->content) == true ? '' : $item->content !!}</p>
                            </div>
                            <div class="cmt-fb">
                                <img src="{{ asset('public/frontend/images/cmt.png') }}" class="img-fluid" width="100%" alt="">
                            </div>
                    </div>
                    @endforeach
                    <div class="other-news">
                        <div class="title-other-news"><span>Bài viết nổi bật</span></div>
                        <div class="list-news">
                            <ul>
                                @if (!empty($news_hot))
                                    @foreach ($news_hot as $item)
                                        <li>
                                            <div class="item">
                                                <div class="avarta"><a href="/book/news-detail/{{ empty($item->slug ) == true ? '' : $item->slug }}.html">
                                                        <img src="{{ asset(empty($item->thumbnail) ? '' : $item->thumbnail)  }}"
                                                            class="img-fluid" alt=""></a>
                                                </div>
                                                <div class="info">
                                                    <div class="date"><span>{{ date('d-m-Y', strtotime($item->updated_at)) }}</span></div>
                                                    <h3><a href="/book/news-detail/{{ empty($item->slug) == true ? '' : $item->slug }}.html">{{ $item->title }}</a></h3>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
