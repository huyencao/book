@extends('backend.index')

@section('title', 'Danh mục sản phẩm')

@section('content')
    <div id="main-content-wp" class="list-cat-page">
        <div class="section" id="title-page">
            <div class="clearfix">
                <a href="{{ route('cate-product.create') }}" title="" id="add-new" class="fl-left add"> Thêm mới</a>
                <h3 id="index" class="fl-left" style="font-weight: bold">Danh sách danh mục</h3>
            </div>
        </div>
        <div class="wrap clearfix">
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <td><input type="checkbox" name="checkAll" id="checkAll"></td>
                                <td><span class="thead-text">STT</span></td>
                                <td><span class="thead-text">Tiêu đề</span></td>
                                <td><span class="thead-text">Trạng thái</span></td>
                                <td><span class="thead-text">Người tạo</span></td>
                                <td><span class="thead-text">Thời gian</span></td>
                                <td><span class="thead-text">Hành động</span></td
                            </tr>
                            </thead>
                            <tbody>
                            @if (!empty($cate_product))
                                @foreach ($cate_product as $key => $value)
                                    <tr>
                                        <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                        <td><span class="tbody-text">{{ ++$key }}</span>
                                        <td class="clearfix">
                                            <div class="tb-title fl-left">
                                                <a href="{{ isset($value->slug) ? $value->slug : ''}}" title="">{{ isset($value->title) ? $value->title : '' }}</a>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="tbody-text">{{ convertStatus($value->status) }}</span>
                                        </td>
                                        <td><span class="tbody-text">{{ isset($value->user->name) ? $value->user->name : '' }}</span></td>
                                        <td>
                                            <span class="tbody-text">{{ date('d-m-Y', strtotime($value->updated_at)) }}</span>
                                        </td>
                                        <td>
                                        <td>
                                            <a href="{{ route('cate-product.edit', $value->id ) }}">
                                                <i class="fa fa-pencil fa-fw"></i> Sửa
                                            </a> &nbsp; &nbsp; &nbsp;
                                            <a href="javascript:;" class="btn-destroy" data-href="{{ route( 'cate-product.destroy',  $value->id ) }}"
                                               data-toggle="modal" data-target="#confim">
                                                <i class="fa fa-trash-o fa-fw"></i> Xóa
                                            </a>
                                        </td>
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
@endsection
