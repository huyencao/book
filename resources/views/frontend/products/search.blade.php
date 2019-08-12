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
                                    <form action="{{ route('product.search') }}" method="get">
                                        {{ csrf_field() }}
                                        <div class="title-search"><span>Tìm kiếm</span></div>
                                        <div class="item">
                                            <input type="text" placeholder="Tên sách" class="form-control" name="name">
                                        </div>
                                        <div class="item">
                                            <select name="class" id="" class="form-control">
                                                <option value="#">Lớp</option>
                                                @if (!empty($list_class))
                                                    @foreach ($list_class as $key => $class_room)
                                                        <option value="{{ !empty($class_room->id) ? $class_room->id : '' }}">{{ !empty($class_room->name) ? $class_room->name : '' }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="item">
                                            <select name="subjects" id="" class="form-control">
                                                <option value="#">Môn học</option>
                                                @if (!empty($list_subjects))
                                                    @foreach ($list_subjects as $key => $subject)
                                                        <option value="{{ !empty($subject->id) ? $subject->id : '' }}">{{ !empty($subject->name) ? $subject->name : '' }}</option>
                                                    @endforeach
                                                @endif
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
                                    <div class="avarta"><img src="{{ asset('public/frontend/images/product.png') }}"
                                                             class="img-fluid" width="100%" alt=""></div>
                                    <div class="title-list-prod"><span>Sản phẩm</span></div>
                                    <div class="sort">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="left-list">
                                                    <ul class="list-inline tabs">
                                                        <li class="list-inline-item tab-link current" data-tab="tab-1">
                                                            <i class="fa fa-th-large"></i> Lưới
                                                        </li>
                                                        <li class="list-inline-item tab-link" data-tab="tab-2">
                                                            <i class="fa fa-th-list"></i> Danh sách
                                                        </li>
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
                                        <div id="tab-1" class="tab-content current">
                                            <div class="row">
                                                @if (!empty($results_search))
                                                    @foreach ($results_search as $product)
                                                        <div class="col-md-4 col-6 col-sm-6">
                                                            <div class="item">
                                                                <div class="avarta"><a
                                                                            href="/book/product-detail/{{ $product->slug }}.html">
                                                                        <img src="{{ asset( empty($product->thumbnail) ? '' : $product->thumbnail) }}"
                                                                             class="img-fluid" alt=""></a></div>
                                                                <div class="info">
                                                                    <div class="vote">
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <h3>
                                                                        <a href="/book/product-detail/{{ empty($product->slug) ? '' : $product->slug }}.html">{{ empty($product->name) ? '' : $product->name }}</a>
                                                                    </h3>
                                                                    <div class="price">
                                                                        @if ($product->price_new == 0)
                                                                            <p>{{ number_format($product->price_old, 0, '.', '.') }}
                                                                                <span>đ</span></p>
                                                                        @else
                                                                            <p>{{ number_format($product->price_new, 0, '.', '.') }}
                                                                                <span>đ</span></p>
                                                                            <del>{{ number_format($product->price_old, 0, '.', '.') }}
                                                                                <span>đ</span></del>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                                <div class="col-md-12">
                                                    {{--                                                    {{ $data_search->links() }}--}}
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab-2" class="tab-content">
                                            <div class="row">
                                                @if (!empty($results_search))
                                                    @foreach ($results_search as $key => $value)
                                                        <div class="col-md-12">
                                                            <div class="item item-list">
                                                                <div class="avarta"><a href="">
                                                                        <img src="{{ asset( empty($value->thumbnail) ? '' : $value->thumbnail) }}"
                                                                             class="img-fluid" alt=""></a>
                                                                </div>
                                                                <div class="info">
                                                                    <div class="vote">
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                    </div>
                                                                    <h3>
                                                                        <a href="/book/product-detail/{{ empty($value->slug) ? '' : $value->slug }}.html">{{ empty($value->name) ? '' : $value->name }}</a>
                                                                    </h3>
                                                                    <div class="price">
                                                                        @if ($value->price_new == 0)
                                                                            <p>{{ number_format($value->price_old, 0, '.', '.') }}
                                                                                <span>đ</span></p>
                                                                        @else
                                                                            <p>{{ number_format($value->price_new, 0, '.', '.') }}
                                                                                <span>đ</span></p>
                                                                            <del>{{ number_format($value->price_old, 0, '.', '.') }}
                                                                                <span>đ</span></del>
                                                                        @endif
                                                                    </div>
                                                                    <div class="desc">
                                                                        <p>{!! str_limit(empty($value->detail) ? '' : $value->detail, 60) !!}</p> ...
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <div class="col-md-12">
{{--                                                {{ $results_search->links() }}--}}
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
@push('scripts')
    <script>
        $(document).ready(function () {

            $('ul.tabs li').click(function () {
                var tab_id = $(this).attr('data-tab');

                $('ul.tabs li').removeClass('current');
                $('.tab-content').removeClass('current');

                $(this).addClass('current');
                $("#" + tab_id).addClass('current');
            })
        })
    </script>
@endpush

