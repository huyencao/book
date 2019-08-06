@extends('backend.index')
@section('controller','Quản lý Menu')
@section('controller_route', route('menu.index'))
@section('action','Thêm')
@section('content')
    <div class="row">
        <div class="col-sm-12" style="padding-bottom: 30px; padding-top: 10px">
            <form action="" method="POST">
                <input type="hidden" id="nestable-output" name="jsonMenu">
                <button class="btn btn-success" type="submit">Cập nhật menu</button>
                <button class="btn btn-info" data-toggle="modal" data-target="#addMenu" type="button">Thêm mới</button>
            </form>
        </div>
        <div class="col-sm-12">
            <div class="dd" id="nestable">
                <ol class="dd-list">
                    <li class="dd-item" data-id="">
                        <div class="dd-handle"> (<i></i>)
                        </div>
                        <div class="button-group">
                            <a href="javascript:;" class="modalEditMenu" data-id="">
                                <i class="fa fa-pencil fa-fw"></i> Sửa
                            </a> &nbsp; &nbsp; &nbsp;
                            <a class="text-danger" href="#" onclick="return confirm('Bạn có chắc chắn xóa không ?')"
                               title="Xóa"> <i class="fa fa-trash-o fa-fw"></i> Xóa</a>
                        </div>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="modal" id="addMenu">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thêm mới</h4>
                </div>
                <form action="{{ route('menu.store') }}" method="POST" class="frm_add">
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <fieldset class="form-group">
                            <label>Tiêu đề</label>
                            <input type="text" class="form-control" placeholder="Nhập tiêu đề" name="name" required>
                        </fieldset>
                        <fieldset class="form-group">
                            <label>Đường đẫn</label>
                            <input type="text" class="form-control" placeholder="Nhập đường dẫn" name="url" required>
                        </fieldset>
                        <fieldset class="form-group clearfix">
                            <label>Trạng thái</label>
                            <select name="page_slug" class="form-control">
                                <option value="#">-- Chọn --</option>
                                <option value="1">Hoạt động</option>
                                <option value="2">Đóng</option>
                            </select>
                        </fieldset>
                        <fieldset class="form-group clearfix">
                            <label>Danh mục cha</label>
                            <select name="parent_id" class="form-control">
                                <option value="#">-- Chọn --</option>
                            </select>
                        </fieldset>
                        <p class='mess_error'></p>
                        <div class="form-group">
                            <button type="submit" name="sm_add" id="btn-save-list">Lưu danh mục</button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal" id="editMenu">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Sửa Menu</h4>
                </div>
                <form action="" method="POST" class="frm_add">
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        {!! method_field('PUT') !!}
                        <fieldset class="form-group">
                            <label>Tiêu đề</label>
                            <input type="text" class="form-control" id="editTitle" name="title" required>
                            <input type="hidden" value="" id="id_menu" name="id">
                        </fieldset>
                        <fieldset class="form-group">
                            <label>Đường đẫn</label>
                            <input type="text" class="form-control" id="editUrl" name="url" required>
                        </fieldset>
                        <fieldset class="form-group">
                            <label>Thứ tự</label>
                            <input type="text" class="form-control" id="editUrl" name="position" required>
                        </fieldset>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Sửa</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script>
        jQuery(document).ready(function ($) {
            var updateOutput = function (e) {
                var list = e.length ? e : $(e.target),
                    output = list.data('output');
                if (window.JSON) {
                    output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
                    var param = window.JSON.stringify(list.nestable('serialize'));
                    $.ajax({
                        url: '',
                        type: 'POST',
                        data: {
                            _token: $('#token').val(),
                            jsonMenu: param
                        },
                    }).done(function () {
                        $.toast({
                            text: "Cập nhật thành công !",
                            heading: 'Thông báo',
                            icon: 'success',
                            showHideTransition: 'fade',
                            allowToastClose: true, // Boolean value true or false
                            hideAfter: 1000,
                            stack: 5,
                            position: 'top-right',
                            textAlign: 'left',
                            loader: true,
                            loaderBg: '#9ec600',
                        });
                    })
                } else {
                    output.val('JSON browser support required for this demo.');
                }
            };
            $('#nestable').nestable({
                group: 1,
                maxDepth: 1
            }).on('change', updateOutput);
            updateOutput($('#nestable').data('output', $('#nestable-output')));
        });
        $('.modalEditMenu').click(function (event) {
            var id = $(this).attr("data-id");
            $.get('{{ asset('backend') }}/menu/' + id + '/edit', function (data) {
                if (data.status == "success") {
                    $('#editTitle').val(data.data.name);
                    $('#editUrl').val(data.data.url);
                    $('#id_menu').val(id);
                    $('#editMenu').modal('show')
                }
            });
        });
    </script>
@endsection