@extends('frontend.layouts.master')

@section('content')
    <main>
        <section id="checkout">
            <div class="container-fluid">
                <form action="{{ route('checkout.store') }}" method='POST' autocomplete="off">
                    <div class="row row-top">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div class="col-sm-12">
                            @include('frontend.block.error')
                        </div>
                        <div class="col-md-6 check-left">
                            <div class="left">
                                <div class="logo"><a href="index.html"><img
                                                src="{{ asset('public/frontend/images/gco.png') }}" class="img-fluid"
                                                alt=""></a></div>
                                <div class="title-check"><span>Thông tin người mua hàng</span></div>
                                <div class="form-checkout">
                                    <div class="item">
                                        <input type="text" placeholder="Họ tên" name="fullname">
                                    </div>
                                    <div class="item">
                                        <input type="text" placeholder="Điện thoại" name="phone">
                                    </div>
                                    <div class="item">
                                        <input type="text" placeholder="Email" name="email">
                                    </div>
                                    <div class="item">
                                        @if (!empty($province))
                                            <select name="province" id="province">
                                                <option value="">Tỉnh/TP</option>
                                                @foreach ($province as $item)
                                                    <option value="{!! !empty($item->provinceid) ? strval($item->provinceid) : '' !!}">{{ !empty($item->name) ? $item->name : ''}}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>
                                    <div class="item">
                                        <select name="district" id="district">
                                            <option value="">Quận/Huyện</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 check-right">
                            <div class="right">
                                <div class="title-check"><span>Phương thức thanh toán</span></div>
                                <div class="list-pay">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="item-pay active" data-tab="tab-1">
                                                <input type="radio" id="test1" name="payment_method">
                                                <label for="test1" class="httt httt1">Thanh toán khi nhận hàng</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="item-pay" data-tab="tab-2">
                                                <input type="radio" id="test2" name="payment_method">
                                                <label for="test2" class="httt httt1">Chuyển khoản ngân hàng</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-tab">
                                    <div class="tab-content active" id="tab-1">
                                        <p>Nhân viên của chúng tôi giao hàng đến quý khách, quý khách sẽ thanh toán đầy
                                            đủ
                                            100% số tiền trực tiếp cho nhân viên của chúng tôi.</p>
                                    </div>
                                    <div class="tab-content" id="tab-2">
                                        <div class="list-bank">
                                            <ul class="list-inline">
                                                <li class="list-inline-item active" data-tab="pay-1"><a
                                                            href="javascript:0"><img
                                                                src="{{ asset('public/frontend/images/pay1.png') }}"
                                                                class="img-fluid" alt=""></a></li>
                                                <li class="list-inline-item" data-tab="pay-2"><a
                                                            href="javascript:0"><img
                                                                src="{{ asset('public/frontend/images/pay2.png') }}"
                                                                class="img-fluid" alt=""></a></li>
                                            </ul>
                                            <div class="content-tab-pay">
                                                <div class="item active" id="pay-1">
                                                    <p>Chủ TK:<strong>NGUYỄN THỊ TÌNH</strong></p>
                                                    <p>Số TK:&nbsp;<strong>12110000444353</strong></p>
                                                    <p>Chi nhánh:&nbsp;Ngân hàng BIDV Chi nhánh Bắc Linh Đàm</p>
                                                </div>
                                                <div class="item" id="pay-2">
                                                    <p>Chủ TK:<strong>NGUYỄN THỊ LONG</strong></p>
                                                    <p>Số TK:&nbsp;<strong>12110000444353</strong></p>
                                                    <p>Chi nhánh:&nbsp;Ngân hàng BIDV Chi nhánh Bắc Linh Đàm</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-tt">
                                    <button>thanh toán</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </section>
    </main>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $("#province").change(function () {
                $id = $(this).val();
                $.ajax({
                    type: 'GET',
                    url: '{{ route('district') }}',
                    data: {province_id: $id},
                    success: function (data) {
                        console.log(data);
                        $('#district').html(data);
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            });
        });
    </script>
@endpush