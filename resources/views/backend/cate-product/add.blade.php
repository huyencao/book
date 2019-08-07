@extends('backend.index')

@section('title', 'Add category product')

@section('content')
    <div id="main-content-wp" class="add-cat-page">
        <div class="section" id="title-page">
            <div class="clearfix">
                <a href="{{ route('cate-product.create') }}" title="" id="add-new" class="fl-left">Thêm mới</a>
                <h3 id="index" class="fl-left">Thêm mới danh mục</h3>
            </div>
        </div>
        <div class="wrap clearfix">
            <div id="content" class="fl-right">
                <div class="section" id="detail-page">
                    <div class="section-detail">
                        <form action="{{ route('cate-product.store') }}" method="POST">
                            <div class="col-sm-12">
                                @include('backend.block.error')
                            </div>
                            {{ csrf_field() }}
                            <label for="title">Tiêu đề</label>
                            <input type="text" name="title" id="title">
                            <label>Danh mục cha</label>
                            <select name="parent_id">
                                <option value="">-- Chọn danh mục --</option>
                                @foreach ($cate_parent as $cate)
                                    <option value="{{ $cate->id }}">{{ $cate->title }}</option>
                                @endforeach
                            </select>
                            <label>Trạng thái</label>
                            <select name="status">
                                <option value="">-- Chọn trạng thái --</option>
                                <option value="1">Đã đăng</option>
                                <option value="0">Đóng</option>
                            </select>
                            <button type="submit" name="btn-submit" id="btn-submit">Thêm mới</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection