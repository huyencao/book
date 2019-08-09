@extends('backend.index')

@section('title', 'GCO-Book/News')

@section('content')
    <div id="main-content-wp" class="list-post-page">
        <div class="section" id="title-page">
            <div class="clearfix">
                <a href="{{ route('news.create') }}" title="" id="add-new" class="fl-left">Thêm mới</a>
                <h3 id="index" class="fl-left">Danh sách liên hệ</h3>
            </div>
        </div>
        <div class="wrap clearfix">
            <div id="content" class="fl-right">
                <div class="section" id="detail-page">
                    <div class="section-detail">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Họ tên</span></td>
                                    <td><span class="thead-text">Số điện thoại</span></td>
                                    <td><span class="thead-text">Email</span></td>
                                    <td><span class="thead-text">Nội dung</span></td>
                                    <td><span class="thead-text">Hành động</span></td>
                                </tr>
                                </thead>
                                <tbody>
{{--                                {{dd($contacts)}}--}}
                                @if (!empty($contacts))
                                    @foreach ($contacts as  $key => $contact)
                                        <tr>
                                            <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                            <td><span class="tbody-text">{{ ++$key }}</span>
                                            <td class="clearfix title-news" style="display: flex">
                                                <div class="tb-title fl-left">
                                                    <a href="" title="">{{ empty($contact->name) == true ? '' :  $contact->name }} </a>
                                                </div>
                                            </td>
                                            <td><span class="tbody-text">{{ empty($contact->phone) == true ? '' :   $contact->phone }} </span></td>
                                            <td><span class="tbody-text">{{ empty($contact->email) == true ? '' :  $contact->email }}</span></td>
                                            <td><span class="tbody-text">{!! empty($contact->content) == true ? '' :  $contact->content !!}</span></td>
                                            <td>
                                                <a href="javascript:;" class="btn-destroy" data-href="{{ route( 'contact-admin.destroy',  $contact->id ) }}"
                                                   data-toggle="modal" data-target="#confim">
                                                    <i class="fa fa-trash-o fa-fw"></i> Xóa
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
