@extends('frontend.layouts.master')

@section('content')
    <main>
        <section id="breadcrumd">
            <div class="container">
                <div class="content">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="index.html">Trang chủ</a></li>
                        <li class="list-inline-item"><span>Checkout</span></li>
                    </ul>
                </div>
            </div>
        </section>
        <section id="cart">
            <div class="container">
                <div class="content">
                    <div class="title-info-cate">
                        <h1>Giỏ hàng của bạn</h1>
                    </div>
                    <div class="table-responsive">
                        @if(count($cart))
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Sản phẩm</th>
                                    <th>Đơn giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $id = 0;?>
                                @foreach($cart as $key => $item)
                                    <tr>
                                        <td><span>{{ ++$id }}</span></td>
                                        <td>
                                            <div class="item-prod">
                                                <div class="avarta"><a href="product-detail.html"><img
                                                                src="{{ asset('public/frontend/images/sp2.png') }}"
                                                                class="img-fluid" alt="" width="100%"></a></div>
                                                <div class="info">
                                                    <h3><a href="product-detail.html">{{$item->name}}</a></h3>
                                                    <div class="vote">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="price">
                                                <span>{{ number_format($item->price, 0, ',', ',') }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="num-prod">
                                                <input class="cart_quantity_input" type="text" name="quantity"
                                                       value="{{ $item->qty }}" autocomplete="off" size="2"
                                                       data-id="{{ $item->rowId }}">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="price">
                                                <span>{{ number_format($item->subtotal, 0, ',', ',') }} đ</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="btn-remove">
                                                <a href="{{ route('delete', $item->rowId) }}"><i
                                                            class="fa fa-trash-o"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                    <div class="num-total">Tổng: {{Cart::total()}} <span>đ</span></div>
                    <div class="update">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-6">
                                <div class="contn-buy">
                                    <a href="{{ route('home.product') }}">Tiếp tục mua hàng</a>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-6">
                                <div class="btn-buy"><a href="{{ route('checkout') }}">Thanh toán</a></div>
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
            $('.cart_quantity_input').change(function () {
                $qty = $(this).val();
                $id = $(this).attr("data-id");
                $.ajax({
                    type: "GET",
                    url: '{{ route('update') }}',
                    data: {qty: $qty, rowId: $id},
                    success: function (data) {
                        console.log(data);
                        location.reload();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            })
        });

    </script>
@endpush
