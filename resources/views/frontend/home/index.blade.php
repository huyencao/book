@extends('frontend.layouts.master')

@section('content')
    <main>
        <section id="banner">
            <div class="avarta">
                @if (!empty($banner[0]->thumbnail))
                    <img src="{{ asset($banner[0]->thumbnail) }}"
                         class="img-fluid" width="100%" style="display: block; margin-bottom: 10px">
                @endif
            </div>

            <div class="caption">
                <div class="container">
                    <div class="info">
                        <p>Học giỏi hơn với</p>
                        <h1><span>Toán Song Ngữ</span></h1>
                        <h2>Lớp 5</h2>
                        <div class="desc">Trong thế giới phẳng, sự tiếp cận tri thức đã trở nên dễ dàng hơn rất nhiều.
                            Công nghệ đã cho phép bạn đọc có nhiều phương thức tiếp cận tri thức
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="product">
            <div class="container">
                <div class="title"><span>sản phẩm nổi bật</span></div>
                <div class="list-prod">
                    <div class="row">
                        @if (!empty($products))
                            @foreach ($products as $product)
                                <div class="col-md-3 col-6 col-sm-6">
                                    <div class="item">
                                        <div class="avarta"><a href="/book/product-detail/{{ $product->slug }}.html">
                                                <img src="{{ asset(!empty($product->thumbnail) ? $product->thumbnail : '') }}" class="img-fluid" alt=""></a></div>
                                        <div class="info">
                                            <div class="vote">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <h3>
                                                <a href="/book/product-detail/{{ empty($product->slug) == true ? '' : $product->slug }}.html">{{ empty($product->name) == true ? '' : $product->name }}</a>
                                            </h3>
                                            <div class="price">{{ number_format($product->price_old, 0, '.', '.') }}
                                                <span>đ</span></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <section id="new-hot">
            <div class="container">
                <div class="title"><span>tin tức nổi bật</span></div>
                <div class="list-news">
                    <ul>
                        @if (!empty($news))
                            @foreach ($news as $item)
                                <li>
                                    <div class="item">
                                        <div class="avarta"><a href="/book/news-detail/{{ empty($item->slug) ? '' : $item->slug }}.html">
                                                <img src="{{ asset(!empty($item->thumbnail) ? $item->thumbnail : '') }}"
                                                        class="img-fluid" alt=""></a></div>
                                        <div class="info">
                                            <div class="date">
                                                <span>{{ date('d-m-Y', strtotime($item->updated_at)) }}</span></div>
                                            <h3><a href="/book/news-detail/{{ empty($item->slug) ? '' : $item->slug }}.html">{{ empty($item->title) ? '' : $item->title }}</a></h3>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </section>
    </main>
@endsection
