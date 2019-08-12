@extends('backend.index')

@section('title', 'Thêm bài viết')

@section('content')
    <div class="row">
        <form action="{{ route('news.store') }}" method='POST' enctype="multipart/form-data" autocomplete="off">
            <div class="col-sm-12">
                @include('backend.block.error')
            </div>
            <div class="col-md-8">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="form-group">
                    <label>Tên bài viết</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="form-group">
                    <label>Mô tả ngắn</label>
                    <input type="text" class="form-control" name="description">
                </div>
                <div class="form-group">
                    <label>Nội dung</label>
                    <textarea id="content" cols="30" rows="10" name="content"></textarea>
                </div>
                <div class="form-group">
                    <label>Danh mục</label>
                    <select name="cate_id" class="form-control">
                        <option value="">Chọn danh mục</option>
                        @foreach($list_cate as $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Tác giả</label>
                    <input type="text" class="form-control" name="author">
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                    <select name="status" class="form-control">
                        <option value="">Chọn trạng thái</option>
                        <option value="1">Đã đăng</option>
                        <option value="2">Đóng</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Bài viết nổi bật</label>
                    <select name="hot" class="form-control">
                        <option value="#">Chọn</option>
                        <option value="1">Có</option>
                        <option value="2">Không</option>
                    </select>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Hình ảnh</label>
                    <div class="file-loading">
                        <input id="inpImg" name="fImage" type="file">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
