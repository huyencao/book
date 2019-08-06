@extends('frontend.layouts.master')

@section('content')
    <main>
        <section id="breadcrumd">
            <div class="container">
                <div class="content">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="index.html">Trang chủ</a></li>
                        <li class="list-inline-item"><a>Sản phẩm</a></li>
                        <li class="list-inline-item"><span>Digital Marketing</span></li>
                    </ul>
                </div>
            </div>
        </section>
        <section id="prod-detail">
            <div class="container">
                <div class="content">
                    @if (!empty($data))
                        @foreach ($data as $item)
                            <div class="info-prod">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="left">
                                            <div id="carouselExampleIndicators" class="carousel slide"
                                                 data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img class="d-block w-100"
                                                             src="{{ asset('frontend/images/thumb.png') }}"
                                                             alt="First slide">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100"
                                                             src="{{ asset('frontend/images/thumb.png') }}"
                                                             alt="First slide">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100"
                                                             src="{{ asset('frontend/images/thumb.png') }}"
                                                             alt="First slide">
                                                    </div>
                                                </div>
                                                <div class="carousel-indicators">
                                                    <div class="item">
                                                        <img src="{{ asset('frontend/images/thumb.png') }}"
                                                             class="img-fluid" data-target="#carouselExampleIndicators"
                                                             data-slide-to="0"/>
                                                    </div>
                                                    <div class="item">
                                                        <img src="{{ asset('frontend/images/thumb.png') }}"
                                                             class="img-fluid" data-target="#carouselExampleIndicators"
                                                             data-slide-to="1"/>
                                                    </div>
                                                    <div class="item">
                                                        <img src="{{ asset('frontend/images/thumb.png') }}"
                                                             class="img-fluid" data-target="#carouselExampleIndicators"
                                                             data-slide-to="2"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="right">
                                            <h1>{{ $item->name }}</h1>
                                            <div class="price">{{ number_format($item->price_new, 0, '.', '.') }} <span>đ</span>
                                            </div>
                                            <del>Giá gốc: {{ number_format($item->price_old, 0, '.', '.') }}
                                                <span>đ</span></del>
                                            <div class="info-book">
                                                <ul>
                                                    <li>Tác giả: <a href="javascript:0">{{ $item->author }}</a></li>
                                                    <li>Nhà xuất bản: {{ $item->publishing_company }}</li>
                                                    <li>Số trang: {{ $item->number_page }} trang</li>
                                                    <li>Tình trạng: Còn hàng</li>
                                                </ul>
                                            </div>
                                            <div class="like-share">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><a href=""><img
                                                                src="{{ asset('frontend/images/like.png') }}"
                                                                class="img-fluid" alt=""></a></li>
                                                    <li class="list-inline-item"><a href=""><img
                                                                src="{{ asset('frontend/images/like.png') }}"
                                                                class="img-fluid" alt=""></a></li>
                                                </ul>
                                            </div>
                                            <div class="btn-buy">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <input type="number" value="1">
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <div class="btn-buy-now">
                                                            <a href="cart.html">mua ngay</a>
                                                        </div>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <div class="read"><a href="">Đọc thử</a></div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="info-prod-detail">
                                <div class="title-info">THÔNG TIN SẢN PHẨM</div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>{{ $item->detail }}</p>
                                    </div>
                                </div>
                                <div class="cmt">
                                    <img src="{{ asset('frontend/images/fb.png') }}" class="img-fluid" width="100%"
                                         alt="">
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="other-list">
                <div class="container">
                    <div class="title-other"><span>Sản phẩm liên quan</span></div>
                    <div class="slide-other">
                        <div class="list-prod">
                            <div class="swiper-container slide-book">
                                <div class="swiper-wrapper">
                                    @if (!empty($list_related))
                                        @foreach ($list_related as $item)
                                            <div class="swiper-slide">
                                                <div class="item">
                                                    <div class="avarta"><a href=""><img
                                                                src="{{ asset('frontend/images/sp1.png') }}"
                                                                class="img-fluid"
                                                                alt=""></a></div>
                                                    <div class="info">
                                                        <div class="vote">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                        <h3><a href="/product-detail/{{ $item->slug }}">{{ $item->name }}g</a></h3>
                                                        <div class="price">{{ number_format($item->price_old, 0, '.', '.') }}<span>đ</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <!-- Add Arrows -->
                                <div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
                                <div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
