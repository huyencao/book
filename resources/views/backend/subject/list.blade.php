@extends('backend.index')

@section('title', 'Môn học')

@section('content')
    <div id="main-content-wp" class="list-post-page">
        <div class="section" id="title-page">
            <div class="clearfix">
                <a href="{{ route('subject.create') }}" title="" id="add-new" class="fl-left">Thêm mới</a>
                <h3 id="index" class="fl-left">Danh sách môn học</h3>
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
                                    <td><span class="thead-text">Tên lớp học</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                    <td><span class="thead-text">Hành động</span></td>
                                </tr>
                                </thead>
                                <tbody>
                                @if (!empty($data))
                                    @foreach ($data as  $key => $item)
                                        <tr>
                                            <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                            <td><span class="tbody-text">{{ ++$key }}</span>
                                            <td class="clearfix title-news" style="display: flex">
                                                <div class="tb-title fl-left">
                                                    <a href="" title="">{{ $item->name }}</a>
                                                </div>
                                            </td>
                                            <td><span
                                                        class="tbody-text">@if ($item->status == 1) {{ __('Kích hoạt') }} @else {{ __('Đóng') }} @endif </span>
                                            </td>
                                            <td>
                                                <span class="tbody-text">{{ empty($item->user->name) == true ? '' :  $item->user->name }}</span>
                                            </td>
                                            <td>
                                                <span class="tbody-text">{{ date('d-m-Y', strtotime($item->updated_at)) }}</span>
                                            </td>
                                            <td>
                                                <a href="{{ route('subject.edit', $item->id ) }}">
                                                    <i class="fa fa-pencil fa-fw"></i> Sửa
                                                </a> &nbsp; &nbsp; &nbsp;
                                                <a href="javascript:;" class="btn-destroy"
                                                   data-href="{{ route( 'subject.destroy',  $item->id ) }}"
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
