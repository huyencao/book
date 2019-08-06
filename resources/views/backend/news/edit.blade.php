@extends('backend.index')

@section('title', 'Add News Book')

@section('content')
    <div class="row">
        <form action="{{ route('news.update', $news->id) }}" method='POST' enctype="multipart/form-data" autocomplete="off">
            {{ method_field('PUT') }}
            <div class="col-sm-12">
                @include('backend.block.error')
            </div>
            <div class="col-md-8">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="form-group">
                    <label>Tên bài viết</label>
                    <input type="text" class="form-control" name="title" value="{{ old('name', isset($news->title) ? $news->title : null) }}">
                </div>
                <div class="form-group">
                    <label>Mô tả ngắn</label>
                    <input type="text" class="form-control" name="description" value="{!! old('description', isset($news->description) ? $news->description : null) !!}">
                </div>
                <div class="form-group">
                    <label>Nội dung</label>
                    <textarea id="content" cols="30" rows="10" name="content" value="{!! old('content', isset($news->content) ? $news->content : null) !!}">{!! old('content', isset($news->content) ? $news->content : null) !!}</textarea>
                </div>
                <div class="form-group">
                    <label>Danh mục</label>
                    <select name="cate_id" class="form-control">
                        <option value="">Chọn danh mục</option>
                        @foreach($list_cate as $item)
                            <option value="{{ $item->id }}" @if ($news->cate_id == $item->id)) selected @endif>{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Tác giả</label>
                    <input type="text" class="form-control" name="author" value="{{ $news->author }}">
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                    <select name="status" class="form-control">
                        <option value="">Chọn trạng thái</option>
                        @if ($news->status == 1)
                            <option value="1" selected>Đã đăng</option>
                            <option value="0">Đóng</option>
                        @else
                            <option value="1">Đã đăng</option>
                            <option value="0" selected>Đóng</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label>Bài viết nổi bật</label>
                    <select name="hot" class="form-control">
                        <option value="#">Chọn</option>
                        @if ($news->hot == 1)
                            <option value="1" selected>Có</option>
                            <option value="0">Không</option>
                        @else
                            <option value="1">Có</option>
                            <option value="0" selected>Không</option>
                        @endif
                    </select>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Hình ảnh</label>
                    @if (!empty($news->thumbnail))
                        <img src="{{ asset($news->thumbnail) }}"
                             class="img-thumbnail" width="50%" style="display: block; margin-bottom: 10px">
                    @endif
                    <div class="file-loading">
                        <input id="inpImg" name="fImage" type="file">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
