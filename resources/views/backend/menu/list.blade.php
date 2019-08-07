@extends('backend.index')

@section('title', 'Menu')

@section('content')
    <div id="main-content-wp" class="list-post-page">
        <div class="section" id="title-page">
            <div class="clearfix">
                <a href="{{ route('menu.create') }}" title="" id="add-new" class="fl-left">Thêm mới</a>
                <h3 id="index" class="fl-left">Danh sách menu</h3>
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
                                    <th>STT</th>
                                    <th>Tên menu</th>
                                    <th>Đường dẫn</th>
                                    <th>Vị trí</th>
                                    <th>Trạng thái</th>
                                    <th>Người tạo</th>
                                    <th>Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if (!empty($list_menu))
                                    @foreach ($list_menu as $key => $menu)
                                        <tr>
                                            <td><span class="tbody-text">{{ ++$key }}</span>
                                            <td>
                                                <div class="tb-title fl-left">
                                                    <a href="" title="">{{ empty($menu->title) == true ? '' :  $menu->title }}</a>
                                                </div>
                                            </td>
                                            <td><span class="tbody-text">{{ empty($menu->link) == true ? '' :  $menu->link }}</span></td>
                                            <td><span class="tbody-text">{{ empty($menu->position) == true ? '' :  $menu->position }}</span></td>
                                            <td><span class="tbody-text"><?php convertStatus($menu->status) ?></span>
                                            </td>
                                            <td ><span class="tbody-text">{{ empty($menu->user->name) == true ? '' :  $menu->user->name }}</span>
                                            </td>
                                            <td><a href="{{ route('menu.edit', $menu->id ) }}">
                                                    <i class="fa fa-pencil fa-fw"></i> Sửa
                                                </a>
                                                <a href="javascript:;" class="btn-destroy"
                                                   data-href="{{ route('menu.destroy', $menu->id ) }}"
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
