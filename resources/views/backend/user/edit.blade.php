@extends('backend.index')
@section('controller','Quản lý tài khoản')
@section('controller_route', '')
@section('title', 'Cập nhật tài khoản')

@section('action','Thêm')
@section('content')
    <div class="row">
        <form action="{{ route('user.update', $data->id) }}" method='POST' enctype="multipart/form-data" autocomplete="off">
            {!! method_field('PUT') !!}
            <div class="col-sm-12">
                @include('backend.block.error')
            </div>
            <div class="col-md-8">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <div class="form-group">
                    <label>Họ và tên</label>
                    <input type="text" class="form-control" name="name" 
                    value="{!! old('name', isset($data->name) ? $data->name : null) !!}">
                </div>
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="text" class="form-control" name="phone" 
                    value="{!! old('phone', isset($data->phone) ? $data->phone : null) !!}">
                </div>
                <div class="form-group">
                    <label>Tài khoản</label>
                    <input type="text" class="form-control" name="user_name" 
                    value="{!! old('user_name', isset($data->user_name) ? $data->user_name : null) !!}" readonly="">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" 
                    value="{!! old('email', isset($data->email) ? $data->email : null) !!}">
                </div>
                <div class="form-group">
                    <label>Vai trò</label>
                    <select name="level" class="form-control">
                        <option value="1" {{ $data->level == 1 ? 'selected' : null }}>Người quản lý</option>
                        <option value="2" {{ $data->level == 2 ? 'selected' : null }}>Biên tập viên</option>
                    </select>
                </div>
                <div id="pass" class="hidden">
                    <div class="form-group">
                      <label>Mật khẩu</label>
                      <input type="password" class="form-control" name="password" value="">
                  </div>
                  <div class="form-group">
                      <label>Nhập lại mật khẩu</label>
                      <input type="password" class="form-control" name="repassword" value="">
                  </div>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="status" 
                    {{ $data->status == 1 ? 'checked' : null }} name="status">
                    <label class="form-check-label" for="status">
                        Kích hoạt
                    </label>
                </div>
               
                <div class="box-footer">

                    <button type="submit" class="btn btn-primary">Lưu lại</button>
                    <button type="button" id="chanePass" class="btn bg-olive margin">Thay đổi mật khẩu</button>
                </div>
            </div>
            <div class="col-sm-4">
                 <div class="form-group">
                      <label>Hình ảnh</label>
                      @if (!empty($data->image))
                        <img src="{{ asset($data->image) }}" 
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
@section('script')
  <script>
    jQuery(document).ready(function($) {
      $('#chanePass').click(function(event) {
        $('#pass').toggleClass('hidden');
      });
    });
  </script>
@endsection