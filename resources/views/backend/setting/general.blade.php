@extends('backend.index')

@section('controller','Cấu hình chung')

@section('action','Cập nhật')

@section('content')

@include('backend.block.error')
<form action="" method='POST' enctype="multipart/form-data" name="frmEditProduct">
   <input type="hidden" name="_token" value="{!! csrf_token() !!}">
   <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
         <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="true">Thông tin chung</a></li>
      </ul>
      <div class="tab-content">
         <div class="tab-pane active" id="activity">
            <div class="row">
               <div class="col-lg-4">
                  <div class="form-group">
                     <label>Logo</label><br>
                      <img src="{{ asset('uploads/config/logo') }}/{{ $site_info->site_logo }}" id="show-img" class="showImg">
                     <div class="file-loading">
                        <input id="inpImg" name="fImage" type="file">
                     </div>
                  </div>
                  <div class="form-group">
                     <label>Favicon</label><br>
                     <img src="{{ asset('uploads/config/logo') }}/{{ $site_info->site_favicon }}" id="show-img" class="showImg">
                     <div class="file-loading">
                        <input id="inpImg3" name="fFavicon" type="file" value="">
                     </div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="form-group">
                     <label>Tên Website</label>
                     <input type="text" class="form-control" name="site_title" id="site_title"
                        value="{!! old('site_title', isset($site_info->site_title) ? $site_info->site_title : null) !!}" required>
                  </div>
                  <div class="form-group">
                     <label>Mô tả ngắn</label>
                     <textarea  class="form-control"
                        name="site_description"
                        id="site_description"
                        rows="6"
                        >{!! old('site_description', isset($site_info->site_description) ? $site_info->site_description : null) !!}</textarea>
                  </div>
                  <div class="form-group">
                     <label>Meta keyword</label>
                     <input type="text" class="form-control" name="site_keyword" id="site_keyword"
                        value="{!! old('site_keyword', isset($site_info->site_keyword) ? $site_info->site_keyword : null) !!}">
                  </div>
                  <div class="form-group">
                     <label>Tên công ty</label>
                     <input type="text" class="form-control" name="site_company" id="site_address"
                        value="{!! old('site_company', isset($site_info->site_company) ? $site_info->site_company : null) !!}">
                  </div>
                  <div class="form-group">
                     <label>Văn phòng giao dịch</label>
                     <input type="text" class="form-control" name="site_office" id="site_address"
                        value="{!! old('site_office', isset($site_info->site_office) ? $site_info->site_office : null) !!}">
                  </div>
                  <div class="form-group">
                     <label>Địa chỉ</label>
                     <input type="text" class="form-control" name="site_address" id="site_address"
                        value="{!! old('site_address', isset($site_info->site_address) ? $site_info->site_address : null) !!}">
                  </div>
                  <div class="form-group">
                     <label>Email</label>
                     <input type="email" class="form-control" name="site_email" id="site_email"
                        value="{!! old('site_email', isset($site_info->site_email) ? $site_info->site_email : null) !!}">
                  </div>
                  <div class="form-group">
                     <label>Số điện thoại</label>
                     <input type="tel" class="form-control" name="site_phone" id="site_phone"
                        value="{!! old('site_phone', isset($site_info->site_phone) ? $site_info->site_phone : null) !!}">
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="form-group">
                     <label>Google Analytics</label>
                     <textarea  class="form-control"
                        name="site_google_analytics"
                        id="site_google_analytics"
                        rows="6"
                        >{!! old('site_google_analytics', isset($site_info->site_google_analytics) ? $site_info->site_google_analytics : null) !!}</textarea>
                  </div>
                  <div class="form-group">
                     <label>Bản quyền</label>
                     <input type="text" class="form-control" name="copyright" 
                     value="{!! old('copyright', isset($site_info->copyright) ? $site_info->copyright : null) !!}">
                  </div>
                  <div class="form-group">
                     <label>CODE GOOGLE MAPS</label>
                     <textarea  class="form-control"
                        name="codemaps"
                        id="codemaps"
                        rows="6"
                        >{!! old('codemaps', isset($site_info->codemaps) ? $site_info->codemaps : null) !!}</textarea>
                  </div>
                  <div class="form-group">
                     <label>Email nhận thông tin liên hệ</label>
                     <input type="text" class="form-control" name="emailinfo" value="">
                  </div>
               </div>
            </div>
            {{--./row--}}
         </div>
         <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
   </div>
   <button type="submit" class="btn btn-primary">OK</button>
</form>
@endsection