@extends('backend.index')

@section('title', 'Danh sách đơn hàng')

@section('content')
    <div id="main-content-wp" class="list-post-page">
        <div class="section" id="title-page">
            <div class="clearfix">
                <h3 id="index" class="fl-left">Danh sách thông tin người mua hàng</h3>
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
                                @if (!empty($data))
                                    @foreach ($data as  $key => $item)
                                        <tr>
                                            <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                            <td><span class="tbody-text">{{ ++$key }}</span>
                                            <td class="clearfix title-news" style="display: flex">
                                                <div class="tb-title fl-left">
                                                    <a href="" title="">{{ !empty($item->fullname) ? $item->fullname : '' }}</a>
                                                </div>
                                            </td>
                                            <td><span class="tbody-text">{{ empty($item->phone) == true ? '' :  $item->phone }} </span></td>
                                            <td><span class="tbody-text">{{ empty($item->email) == true ? '' :  $item->email }}</span></td>
                                            <td><span class="tbody-text">{{ empty($item->content) ? '' : $item->content }}</span></td>
                                            <td>
                                                <a href="javascript:;" class="btn-destroy" data-href="{{ route( 'order.destroy',  $item->id ) }}"
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
