@extends('backend.index')

@section('title', 'Thêm mới')

@section('content')
    <div class="row">
        <form action="{{ route('menu.store') }}" method='POST' enctype="multipart/form-data" autocomplete="off">
            <div class="col-sm-12">
                @include('backend.block.error')
            </div>
            <div class="col-md-8">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="form-group">
                    <label for="title">Tên menu</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>
                <div class="form-group clearfix">
                    <label>Danh mục cha</label>
                    <select name="parent_id" class="form-control">
                        <option value="0">-- Chọn --</option>
                        @if (!empty($menu_parent))
                            @foreach ($menu_parent as $parent)
                                <option value="">{{ $parent->title }}</option>
                            @endforeach
                            @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="menu-order">Đường dẫn</label>
                    <input type="text" name="link" id="menu-order" class="form-control">
                </div>
                <div class="form-group">
                    <label for="menu-order">Thứ tự</label>
                    <input type="text" name="position" id="menu-order" class="form-control">
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                    <select name="status" class="form-control">
                        <option value="">Chọn trạng thái</option>
                        <option value="1">Kích hoạt</option>
                        <option value="0">Đóng</option>
                    </select>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                </div>
            </div>
        </form>
    </div>
@endsection
