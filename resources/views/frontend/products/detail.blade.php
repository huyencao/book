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
                                                             src="{{ asset(empty($item->thumbnail) ? '' : $item->thumbnail) }}"
                                                             alt="First slide">
                                                    </div>
                                                </div>
                                                <div class="carousel-indicators">
                                                    {{--                                                    {{ var_dump(json_decode($item->image_gallery)) }}--}}
                                                    @if (!empty($item->image_gallery))
                                                        @foreach (json_decode($item->image_gallery) as $key => $value)
                                                            <div class="item">
                                                                <img src="{!! asset($value) !!}"
                                                                     class="img-fluid"
                                                                     data-target="#carouselExampleIndicators"
                                                                     data-slide-to="0"/>
                                                            </div>
                                                        @endforeach
                                                    @endif
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
                                        <p>{!! empty($item->detail) == true ? '' : $item->detail !!}</p>
                                    </div>
                                </div>
                                <div class="cmt">
                                    <div class="review_comment" style="margin-bottom: 25px">
                                        <h4>{{ __('Chia sẻ nhận xét về sản phẩm') }}</h4>
                                        <button type="button" class="btn btn-default js-customer-button"
                                                id="button">{{ __('Viết nhận xét của bạn') }}
                                        </button>
                                    </div>

                                    @include('frontend.block.error')

                                    <div class="write-comment" id="writeComment" style="display: none">
                                        <form action="{{ route('comment.store') }}" method="POST" autocomplete="off">
                                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                                            <div class="form-group">
                                                <label for="usr">Họ tên</label>
                                                <input type="text" class="form-control" id="name" name="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="usr">Email</label>
                                                <input type="email" class="form-control" id="email" name="email">
                                            </div>
                                            <div class="form-group">
                                                <label for="comment">Nội dung đánh giá</label>
                                                <textarea class="form-control" rows="5" id="content"
                                                          name="content"></textarea>
                                            </div>
                                            <div class="form-group required">
                                                <label for="usr">Đánh giá sao</label>
                                                <div class="lead evaluation">
                                                    <span id="colorstar" class="starrr ratable"></span>
                                                    <span id="meaning"></span>
                                                    <input type="hidden" name="rating" id="count">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-info"
                                                        id="saveReview">Comment
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="comments">
                                        @foreach($list_comment as $comment)
                                            <div class="rv-comment" style="display: block; margin-bottom: 20px;">
                                                <span class="star" style=" color: #ffc120;">{{ star($comment->star) }}</span>
                                                <span class="name-comment" style="padding-bottom: 5px;">{{ $comment->name }}</span><br/>
                                                <span class="content-comment" style="display:block; font-size: 14px; margin-top: 7px">{{ $comment->content }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
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
                                                    <div class="avarta">
                                                        <a href=""><img
                                                                    src="{{ asset(empty($item->thumbnail) == true ? '' : $item->thumbnail) }}"
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
                                                        <h3>
                                                            <a href="/product-detail/{{ $item->slug }}">{{ $item->name }}
                                                                g</a></h3>
                                                        <div class="price">{{ number_format($item->price_old, 0, '.', '.') }}
                                                            <span>đ</span></div>
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
