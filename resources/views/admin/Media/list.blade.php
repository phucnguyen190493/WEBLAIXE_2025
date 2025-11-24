@extends('admin.layout.layout')
@section('content')
<!-- Page Content -->

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 50px;">
                <h1 class="page-header">Media
                    <small>Danh Sách</small>
                </h1>
                @if(session('flash_success'))
                <div class="alert alert-success">
                    <strong>Thành Công! </strong>{{ session('flash_success') }}
                </div>
                @endif
                 @if(session('flash_err'))
                <div class="alert alert-danger">
                    <strong>Cảnh Báo! </strong>{{ session('flash_err') }}
                </div>
                @endif
                <table class="table table-striped table-bordered table-hover " id="example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>URL</th>
                            <th>Ảnh</th>
                            <th>Note</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr class="odd gradeX">
                            <td>{{ $post["id"] }}</td>
                            <td>
                                {{ $path.$post["name"] }}
                            </td>
                            <td>
                                <a href="{{ $path.$post["name"] }}" target="_blank"><img src="{{ 'images/cauhoi/'.$post["name"] }}" style="width: 50px" /></a>
                            </td>
                            <td>
                                {{ $post["note"] }}
                            </td>
                            <td>
                                <button data-id="{{$post["id"]}}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete">
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
            <h4 class="modal-title">Xóa Media</h4>
        </div>
        <div class="modal-body">
            <form id="form-delete">
                {{ csrf_field() }}
                <input type="hidden" name="id" id="del-id">
                <p>Bạn có chắc muốn xóa Media với id <strong id="del-id"></strong> này?</p>
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
          modal.find('.modal-body #delete').attr('href', 'admin/media/delete/'+iddel);
        })
    });
 </script>
<script src="admin_asset/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
<script src="js/bootstrap-flash-alert.js"></script>
@endsection
