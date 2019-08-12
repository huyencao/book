@extends('backend.index')

@section('title', 'Thêm sản phẩm')

@section('content')
    <div class="row">
        <form action="{{ route('product.store') }}" method='POST' enctype="multipart/form-data" autocomplete="off">
            <div class="col-sm-12">
                @include('backend.block.error')
            </div>
            {{ csrf_field() }}
            <div class="col-md-8">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label>Giá sản phẩm</label>
                    <input type="text" class="form-control" name="price_old">
                </div>
                <div class="form-group">
                    <label>% Khuyến mãi</label>
                    <input type="text" class="form-control" name="sale">
                </div>
                <div class="form-group">
                    <label>Nhà xuất bản</label>
                    <input type="text" class="form-control" name="publishing_company">
                </div>
                <div class="form-group">
                    <label>Tổng số trang</label>
                    <input type="text" class="form-control" name="number_page">
                </div>
                <div class="form-group">
                    <label>Số quyển sách</label>
                    <input type="text" class="form-control" name="total">
                </div>
                <div class="form-group">
                    <label>Nội dung</label>
                    <textarea id="content" cols="30" rows="10" name="detail"></textarea>
                </div>
                <div class="form-group">
                    <label>Tác giả</label>
                    <input type="text" class="form-control" name="author">
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                    <select name="status" class="form-control">
                        <option value="">Chọn trạng thái</option>
                        <option value="1">Kích hoạt</option>
                        <option value="0">Đóng</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Sản phẩm nổi bật</label>
                    <select name="hot" class="form-control">
                        <option value="">Chọn</option>
                        <option value="1">Có</option>
                        <option value="0">Không</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Danh mục</label>
                    <select name="cate_id" class="form-control">
                        <option value="">Chọn danh mục</option>
                        {{--                        @foreach($cate_product as $item)--}}
                        {{--                            <option value="{{ $item->id }}">{{ $item->title }}</option>--}}
                        {{--                        @endforeach--}}
                        {!! showCategories($cate_product) !!}
                    </select>
                </div>
                <div class="form-group">
                    <label>Lớp học</label>
                    <select name="class_id" class="form-control">
                        <option value="">Chọn</option>
                        @if (!empty($list_class))
                            @foreach ($list_class as $class_room)
                                <option value="{{ !empty($class_room->id) ? $class_room->id : '' }}">{{ !empty($class_room->name) ? $class_room->name : '' }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label>Môn học</label>
                    <select name="hot" class="form-control">
                        <option value="">Chọn</option>
                        @if (!empty($list_subject))
                            @foreach ($list_subject as $subject)
                                <option value="{{ !empty($subject->id) ? $subject->id : '' }}">{{ !empty($subject->name) ? $subject->name : '' }}</option>
                            @endforeach
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
                    <div class="file-loading">
                        <input id="inpImg" name="fImage" type="file">
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Hình ảnh liên quan</label>
                    <div class="file-loading">
                        <input id="gallery" name="fImageGallery[]" type="file" multiple>
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection
