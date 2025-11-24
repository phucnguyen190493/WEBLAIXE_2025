@php
  use Illuminate\Support\Str;
@endphp

@extends('admin.layout.layout')
@section('content')
<!-- Page Content -->

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 50px;">
                <h1 class="page-header">Hình ảnh
                    <small>Danh Sách</small>
                </h1>
                @if(session('success'))
                <div class="alert alert-success">
                    <strong>Thành Công! </strong>{{ session('success') }}
                </div>
                @endif
                 @if(session('error'))
                <div class="alert alert-danger">
                    <strong>Cảnh Báo! </strong>{{ session('error') }}
                </div>
                @endif
                <table class="table table-striped table-bordered table-hover text-center" id="example">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Câu hỏi ID</th>
                            <th class="text-center">STT</th>
                            <th class="text-center">Media ID</th>
                            <th class="text-center">Nội dung</th>
                            <th class="text-center">Kích hoạt</th>
                            <th class="text-center">Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($hinhanhs as $hinhanh)
                        <tr class="odd gradeX">
                            <td>{{ $hinhanh["id"] }}</td>
                            <td>
                                {{ $hinhanh["CauHoiId"] }}
                                [{{ Str::limit(strip_tags($hinhanh->CauHoi->noidung), 50, ' [...]') }}]
                            </td>
                            <td>
                                {{ $hinhanh["stt"] }}
                            </td>
                            <td>
                                {{ $hinhanh->MediaId }}
                                <a href="{{ $path.($hinhanh->Media->name) }}" target="_blank"><img src="{{ 'images/cauhoi/'.($hinhanh->Media->name) }}" style="width: 50px" /></a>
                            </td>
                            <td>
                                {{ Str::limit(strip_tags($hinhanh->noidung), 50, ' [...]') }}
                            </td>
                            <td>
                                <input type="checkbox" @checked($hinhanh["active"] == 1) readonly onclick="return false;"/>
                            </td>
                            <td style="display: inline-flex;">
                                <a href="admin/hinhanh/update/{{$hinhanh["id"]}}" class="btn btn-info btn-sm">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa
                                </a>
                                <!-- <form action="{{ route('admin.hinhanh_destroy', $hinhanh["id"]) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i> Xoá</button>
                                </form> -->
                                <button data-id="{{$hinhanh["id"]}}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete">
                                    <i class="fa fa-trash" aria-hidden="true"></i> Xoá
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<!-- Modal Delete-->
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Xóa Hình ảnh</h4>
        </div>
        <div class="modal-body">
            <form id="form-delete">
                {{ csrf_field() }}
                <input type="hidden" name="id" id="del-id">
                <p>Bạn có chắc muốn xóa Hình ảnh với id <strong id="del-id"></strong> này?</p>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="" class="btn btn-danger" id="delete">Xóa</a>
            </div>
            </form>
        </div>
    </div>
  </div>
</div>
@endsection
@section('script')
 <script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable({'iDisplayLength': '50',"order": [[ 0, "desc" ]]});

        $('#modal-delete').on('show.bs.modal', function (event) {
          let button = $(event.relatedTarget)
          let iddel = button.data('id')
          let modal = $(this)
          modal.find('.modal-body #del-id').html(iddel);
          modal.find('.modal-body #delete').attr('href', 'admin/hinhanh/delete/'+iddel);
        })
    });
 </script>
<script src="admin_asset/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
<script src="js/bootstrap-flash-alert.js"></script>
@endsection
