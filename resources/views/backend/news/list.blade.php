@extends('backend.index')

@section('title', 'Danh sách bài viết')

@section('content')
    <div id="main-content-wp" class="list-post-page">
        <div class="section" id="title-page">
            <div class="clearfix">
                <a href="{{ route('news.create') }}" title="" id="add-new" class="fl-left">Thêm mới</a>
                <h3 id="index" class="fl-left">Danh sách bài viết</h3>
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
                                    <td><span class="thead-text">Tiêu đề</span></td>
                                    <td><span class="thead-text">Danh mục</span></td>
                                    <td><span class="thead-text">Trạng thái</span></td>
                                    <td><span class="thead-text">Người tạo</span></td>
                                    <td><span class="thead-text">Thời gian</span></td>
                                    <td><span class="thead-text">Hành động</span></td>
                                </tr>
                                </thead>
                                <tbody>
                                @if (!empty($list_news))
                                    @foreach ($list_news as  $key => $news)
                                        <tr>
                                            <td><input type="checkbox" name="checkItem" class="checkItem"></td>
                                            <td><span class="tbody-text">{{ ++$key }}</span>
                                            <td class="clearfix title-news" style="display: flex">
                                                <div class="tb-title fl-left">
                                                    <a href="" title="">{{ $news->title }}</a>
                                                </div>
                                            </td>
                                            <td><span class="tbody-text">{{ empty($news->categoryNews->title) == true ? '' :  $news->categoryNews->title }} </span></td>
                                            <td><span
                                                        class="tbody-text">@if ($news->status == 1) {{ __('Open') }} @elseif ($news->status == 2) {{ __('Close') }} @else {{ __('Trash') }} @endif </span>
                                            </td>
                                            <td><span class="tbody-text">{{ empty($news->user->name) == true ? '' :  $news->user->name }}</span></td>
                                            <td><span class="tbody-text">{{ date('d-m-Y', strtotime($news->updated_at)) }}</span></td>
                                            <td>
                                                <a href="{{ route('news.edit', $news->id ) }}">
                                                    <i class="fa fa-pencil fa-fw"></i> Sửa
                                                </a> &nbsp; &nbsp; &nbsp;
                                                <a href="javascript:;" class="btn-destroy" data-href="{{ route( 'news.destroy',  $news->id ) }}"
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
