@extends('backend.index')

@section('title', 'Edit product book')

@section('content')
    <div class="row">
        <form action="{{ route('product.update', $product->id) }}" method='POST' enctype="multipart/form-data" autocomplete="off">
            <div class="col-sm-12">
                @include('backend.block.error')
            </div>
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="col-md-8">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name" value="{{ empty($product->name) == true ? null : $product->name }}">
                </div>
                <div class="form-group">
                    <label>Giá sản phẩm</label>
                    <input type="text" class="form-control" name="price_old" value="{{ empty($product->price_old) == true ? null : $product->price_old }}">
                </div>
                <div class="form-group">
                    <label>% Khuyến mãi</label>
                    <input type="text" class="form-control" name="sale" value="{{ empty($product->sale) == true ? '' : $product->sale }}">
                </div>
                <div class="form-group">
                    <label>Nhà xuất bản</label>
                    <input type="text" class="form-control" name="publishing_company" value="{{ empty($product->publishing_company) == true ? '' : $product->publishing_company}}">
                </div>
                <div class="form-group">
                    <label>Tổng số trang</label>
                    <input type="text" class="form-control" name="number_page" value="{{ empty($product->number_page) == true ? '' : $product->number_page }}">
                </div>
                <div class="form-group">
                    <label>Số quyển sách</label>
                    <input type="text" class="form-control" name="total" value="{{ empty($product->total) == true ? '' : $product->total }}">
                </div>
                <div class="form-group">
                    <label>Nội dung</label>
                    <textarea id="content" cols="30" rows="10" name="detail">{{ empty($product->detail) == true ? '' : $product->detail }}</textarea>
                </div>
                <div class="form-group">
                    <label>Lớp</label>
                    <input type="text" class="form-control" name="class" value="{{ empty($product->class) == true ? '' : $product->class }}">
                </div>
                <div class="form-group">
                    <label>Môn học</label>
                    <input type="text" class="form-control" name="subjects"  value="{{ empty($product->subjects) == true ? '' : $product->subjects }}">
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                    <select name="status" class="form-control">
                        <option value="#">Chọn trạng thái</option>
                        @if ($product->status == 1)
                            <option value="1" selected>Kích hoạt</option>
                            <option value="0">Đóng</option>
                        @else
                            <option value="1">Kích hoạt</option>
                            <option value="0" selected>Đóng</option>
                        @endif
                    </select>
                    </select>
                </div>
                <div class="form-group">
                    <label>Sản phẩm nổi bật</label>
                    <select name="hot" class="form-control">
                        <option value="#">Chọn</option>
                        @if ($product->hot == 1)
                            <option value="1" selected>Kích hoạt</option>
                            <option value="0">Đóng</option>
                        @else
                            <option value="1">Kích hoạt</option>
                            <option value="0" selected>Đóng</option>
                        @endif
                    </select>
                    </select>
                </div>
                <div class="form-group">
                    <label>Danh mục</label>
                    <select name="cate_id" class="form-control">
                        <option value="">Chọn danh mục</option>
                        @foreach($cate_product as $item)
                            <option value="{{ $item->id }}" @if ($product->cate_id == $item->id)) selected @endif>{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Hình ảnh</label>
                    @if (!empty($product->thumbnail))
                        <img src="{{ asset($product->thumbnail) }}"
                             class="img-thumbnail" width="50%" style="display: block; margin-bottom: 10px">
                    @endif
                    <div class="file-loading">
                        <input id="inpImg" name="fImage" type="file">
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Hình ảnh liên quan</label>
                    @if (!empty($product->image_gallery))
                        @foreach (json_decode($product->image_gallery) as $key => $value)
                                <img src="{!! asset($value) !!} " class="img-thumbnail" width="50%" style="display: block; margin-bottom: 10px">
                        @endforeach
                    @endif
{{--                    {{ var_dump(json_decode($product->image_gallery)) }}--}}
                    <div class="file-loading">
                        <input id="gallery" name="fImageGallery[]" type="file" multiple>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
