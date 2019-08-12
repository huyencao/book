@extends('frontend.layouts.master')

@section('content')
    <main>
        <section id="breadcrumd">
            <div class="container">
                <div class="content">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="index.html">Trang chủ</a></li>
                        <li class="list-inline-item"><span>Liên hệ</span></li>
                    </ul>
                </div>
            </div>
        </section>
        <section id="contact">
            <div class="container">
                <div class="content">
                    <div class="title-info-cate">
                        <h1>Liên hệ</h1>
                    </div>
                    <div class="info-contact">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="left">
                                    <div class="place">
                                        <p>
                                            <i class="fa fa-map-marker"></i>{{ isset($setting->site_address) ? $setting->site_address : ''}}
                                        </p>
                                        <p style="color: #e81919"><i
                                                    class="fa fa-phone"></i>{{ isset($setting->site_phone) ? $setting->site_phone : '' }}
                                        </p>
                                        <p style="color: #2863db">
                                            <i>@</i>{{ isset($setting->email_info) ? $setting->email_info : '' }}</p>
                                    </div>
                                    <div class="maps">
                                        {!! empty($setting->code_maps) == true ? '' : $setting->code_maps !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="right">
                                    <div class="form-sent">
                                        @if(session('flash_message'))
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="alert alert-{!! session('flash_level') !!} alert-dismissible">
                                                        <button type="button" class="close" data-dismiss="alert"
                                                                aria-hidden="true">×
                                                        </button>
                                                        <h4><i class="icon fa fa-check"></i> Thông báo</h4>
                                                        {!! session('flash_message') !!}
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <form action="{{ route('lien-he.store') }}" method='POST' autocomplete="off">
                                            <div class="title-form">GỬI LIÊN HỆ</div>
                                            @include('frontend.block.error')
                                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                            <div class="list-item-form">
                                                <div class="item">
                                                    <input type="text" placeholder="Họ tên" name="name">
                                                </div>
                                                <div class="item">
                                                    <input type="text" placeholder="Điện thoại" name="phone">
                                                </div>
                                                <div class="item">
                                                    <input type="text" placeholder="Email" name="email">
                                                </div>
                                                <div class="item">
                                                    <textarea name="content" placeholder="Nội dung" id="" cols="30"
                                                              rows="10"></textarea>
                                                </div>
                                                <div class="item">
                                                    <input type="submit" value="gửi" class="btn-sent">
                                                </div>
                                            </div>
                                        </form>
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