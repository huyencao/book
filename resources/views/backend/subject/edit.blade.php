@extends('backend.index')

@section('title', 'Chỉnh sửa môn học')

@section('content')
    <div class="row">
        <form action="{{ route('subject.update', $data->id) }}" method='POST' autocomplete="off">
            {{ method_field('PUT') }}
            <div class="col-sm-12">
                @include('backend.block.error')
            </div>
            <div class="col-md-8">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="form-group">
                    <label>Tên lớp</label>
                    <input type="text" class="form-control" name="name" value="{{ !empty($data->name) ? $data->name : ''  }}">
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                    <select name="status" class="form-control">
                        <option value="">Chọn trạng thái</option>
                        @if ($data->status == 1)
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
        </form>
    </div>
@endsection
