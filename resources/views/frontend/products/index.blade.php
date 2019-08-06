@extends('frontend.layouts.master')

@section('content')
    <main>
        <section id="breadcrumd">
            <div class="container">
                <div class="content">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="">Trang chủ</a></li>
                        <li class="list-inline-item"><span>Sản phẩm</span></li>
                    </ul>
                </div>
            </div>
        </section>
        <section id="product-cate">
            <div class="container">
                <div class="content">
                    <div class="row">
                        <div class="col-md-3 side-bar">
                            <div class="left">
                                <div class="search-sidebar">
                                    <form action="">
                                        <div class="title-search"><span>Tìm kiếm</span></div>
                                        <div class="item">
                                            <input type="text" placeholder="Tên sách" class="form-control">
                                        </div>
                                        <div class="item">
                                            <select name="" id="" class="form-control">
                                                <option value="">Lớp</option>
                                                <option value="">Lớp 2</option>
                                                <option value="">Lớp 3</option>
                                                <option value="">Lớp 4</option>
                                                <option value="">Lớp 5</option>
                                            </select>
                                        </div>
                                        <div class="item">
                                            <select name="" id="" class="form-control">
                                                <option value="">Môn học</option>
                                                <option value="">Môn học 2</option>
                                                <option value="">Môn học 1</option>
                                                <option value="">Môn học 4</option>
                                            </select>
                                        </div>
                                        <div class="item">
                                            <button type="submit">Tìm kiếm</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="right">
                                <div class="list-prod">
                                    <div class="avarta"><img src="{{ asset('frontend/images/product.png') }}"
                                                             class="img-fluid" width="100%" alt=""></div>
                                    <div class="title-list-prod"><span>Sản phẩm</span></div>
                                    <div class="sort">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="left-list">
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item"><a href="product.html"><i
                                                                    class="fa fa-th-large"></i>Lưới</a></li>
                                                        <li class="list-inline-item"><a href="product-list.html"><i
                                                                    class="fa fa-th-list"></i>Danh sách</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="right-list">
                                                    <ul class="list-inline list-sort">
                                                        <li class="list-inline-item"><span>Sắp xếp theo</span></li>
                                                        <li class="list-inline-item">
                                                            <dl class="dropdown">
                                                                <dt><a><span>Tên sách A-Z <i
                                                                                class="fa fa-caret-down"></i></span></a>
                                                                </dt>
                                                                <dd>
                                                                    <ul>
                                                                        <li><a>Sách mới</a></li>
                                                                        <li><a>Tên sách A-Z</a></li>
                                                                        <li><a>Giá từ cao - thấp</a></li>
                                                                    </ul>
                                                                </dd>
                                                            </dl>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-prod">
                                        <div class="row">
                                            @if (!empty($products))
                                                @foreach ($products as $product)
                                                    <div class="col-md-4 col-6 col-sm-6">
                                                        <div class="item">
                                                            <div class="avarta"><a href="/product-detail/{{ $product->slug }}"><img
                                                                        src="{{ asset('frontend/images/sp5.png') }}"
                                                                        class="img-fluid" alt=""></a></div>
                                                            <div class="info">
                                                                <div class="vote">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                </div>
                                                                <h3><a href="/product-detail/{{ $product->slug }}">{{ $product->name }}</a>
                                                                </h3>
                                                                <div class="price">
                                                                    <p>{{ number_format($product->price_old, 0, '.', '.') }}<<span>đ</span></p>
                                                                    <del>{{ number_format($product->price_new, 0, '.', '.') }}<<span>đ</span></del>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            <div class="col-md-12">
                                               {{ $products->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
