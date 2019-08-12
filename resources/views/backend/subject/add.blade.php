@extends('backend.index')

@section('title', 'Thêm môn học')

@section('content')
    <div class="row">
        <form action="{{ route('subject.store') }}" method='POST' enctype="multipart/form-data" autocomplete="off">
            <div class="col-sm-12">
                @include('backend.block.error')
            </div>
            <div class="col-md-8">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="form-group">
                    <label>Tên lớp</label>
                    <input type="text" class="form-control" name="name">
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
