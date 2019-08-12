@extends('backend.index')

@section('title', 'Chỉnh sửa banner')

@section('content')
    <div class="row">
        <form action="{{ route('banner.update', $banner->id) }}" method='POST' enctype="multipart/form-data" autocomplete="off">
            {{ method_field('PUT') }}
            <div class="col-sm-12">
                @include('backend.block.error')
            </div>
            <div class="col-md-8">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="form-group">
                    <label>Tên banner</label>
                    <input type="text" class="form-control" name="name" value="{{ isset($banner->name) ? $banner->name : '' }}">
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                    <select name="status" class="form-control">
                        <option value="">Chọn trạng thái</option>
                       @if ($banner->status == 1)
                            <option value="1" selected>Kích hoạt</option>
                            <option value="0">Đóng</option>
                        @else
                            <option value="1">Kích hoạt</option>
                            <option value="0" selected>Đóng</option>
                        @endif
                    </select>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label>Hình ảnh</label>
                    @if (!empty($banner->thumbnail))
                        <img src="{{ asset($banner->thumbnail) }}"
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
