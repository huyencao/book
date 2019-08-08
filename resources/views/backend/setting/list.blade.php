@extends('backend.index')

@section('controller','Cấu hình chung')

{{--@section('action','Cập nhật')--}}

@section('content')

@include('backend.block.error')
<form action="{{ route('setting.update', $site_info->id) }}" method='POST' enctype="multipart/form-data" name="frmEditProduct">
   {{ method_field('PUT') }}
   <input type="hidden" name="_token" value="{!! csrf_token() !!}">
   <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
         <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="true">Thông tin chung</a></li>
      </ul>
      <div class="tab-content">
         <div class="tab-pane active" id="activity">
            <div class="row">
               <div class="col-lg-8">
                  <div class="form-group">
                     <label>Tên Website</label>
                     <input type="text" class="form-control" name="site_title" id="site_title" value="{{ isset($site_info->site_name) ? $site_info->site_name : '' }}" disabled="disabled"
                            required>
                  </div>
                  <div class="form-group">
                     <label>Giới thiệu</label>
                     <textarea class="form-control" name="description" id="content">{{ isset($site_info->description) ? $site_info->description : '' }}</textarea>
                  </div>
                  <div class="form-group">
                     <label>Tên công ty</label>
                     <input type="text" class="form-control" name="site_company" id="site_address" value="{{ isset($site_info->site_company) ? $site_info->site_company : '' }}" disabled>
                  </div>
                  <div class="form-group">
                     <label>Văn phòng giao dịch</label>
                     <input type="text" class="form-control" name="site_office" id="site_address" value="{{ isset($site_info->site_office) ? $site_info->site_office : '' }}">
                  </div>
                  <div class="form-group">
                     <label>Địa chỉ</label>
                     <input type="text" class="form-control" name="site_address" id="site_address" value="{{ isset($site_info->site_address) ? $site_info->site_address : '' }}">
                  </div>
                  <div class="form-group">
                     <label>Email</label>
                     <input type="email" class="form-control" name="site_email" id="site_email" value="{{ isset($site_info->site_email) ? $site_info->site_email : '' }}">
                  </div>
                  <div class="form-group">
                     <label>Số điện thoại</label>
                     <input type="tel" class="form-control" name="site_phone" id="site_phone" value="{{ isset($site_info->site_phone) ? $site_info->site_phone : '' }}">
                  </div>
                  <div class="form-group">
                     <label>Hotline</label>
                     <input type="tel" class="form-control" name="site_hotline" id="site_hotline" value="{{ isset($site_info->site_hotline) ? $site_info->site_hotline : '' }}">
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="form-group">
                     <label>Logo</label><br>
                     @if (!empty($site_info->site_logo))
                        <img src="{{ asset($site_info->site_logo) }}"
                             class="img-thumbnail" width="50%" style="display: block; margin-bottom: 10px">
                     @endif
                     <div class="file-loading">
                        <input id="inpImg" name="fImage" type="file">
                     </div>
                  </div>
                  <div class="form-group">
                     <label>Favicon</label><br>
                     @if (!empty($site_info->site_favicon))
                        <img src="{{ asset($site_info->site_favicon) }}"
                             class="img-thumbnail" width="50%" style="display: block; margin-bottom: 10px">
                     @endif                     <div class="file-loading">
                        <input id="inpImg3" name="fFavicon" type="file" value="">
                     </div>
                  </div>
                  <div class="form-group">
                     <label>Google Analytics</label>
                     <textarea  class="form-control" name="google_analytics" id="site_google_analytics" rows="6">{{ isset($site_info->google_analytics) ? $site_info->google_analytics : '' }}</textarea>
                  </div>
                  <div class="form-group">
                     <label>Bản quyền</label>
                     <input type="text" class="form-control" name="site_copyright"
                     value="{{ isset($site_info->site_coppyright) ? $site_info->site_coppyright : null }}" disabled>
                  </div>
                  <div class="form-group">
                     <label>CODE GOOGLE MAPS</label>
                     <textarea  class="form-control" name="code_maps" id="code_maps" rows="6">{!! isset($site_info->code_maps) ? $site_info->code_maps : null !!}</textarea>
                  </div>
                  <div class="form-group">
                     <label>Email nhận thông tin liên hệ</label>
                     <input type="text" class="form-control" name="email_info" value="{{ isset($site_info->email_info) ? $site_info->email_info : null }}">
                  </div>
               </div>
            </div>
         </div>
         <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
   </div>
   <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>
@endsection