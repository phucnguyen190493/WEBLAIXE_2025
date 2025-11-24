@extends('admin.layout.layout')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Câu hỏi
                    <small>Cập nhật</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12" style="padding-bottom:70px">
             @if(count($errors)>0)
             <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                {{ $err }}<br>
                @endforeach
            </div>
            @endif

            <form action="{{ isset($cauhoi) ? route('admin.cauhoi_update', $cauhoi->id) : route('admin.cauhoi_store') }}" method="POST">
                @csrf
                @if(isset($cauhoi))
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label>STT</label>
                    <input type="number" step="1" name="stt" value="{{ $cauhoi->stt ?? '' }}" placeholder="Số thứ tự" class="form-control">
                </div>
                <div class="form-group">
                    <label>Nội dung</label>
                    <textarea name="noidung" id="noidung" class="form-control ckeditor" rows="3">{{ $cauhoi->noidung }}</textarea>
                </div>
                <div class="form-group">
                    <label>Giải thích đáp án</label>
                     <textarea name="giaithichdapan" id="giaithichdapan" class="form-control ckeditor" rows="3">{{ $cauhoi->giaithichdapan }}</textarea>
                </div>
                <div class="form-group">
                    <label>Câu liệt</label>
                    <input type="hidden" name="cauliet" value="0">
                    <input type="checkbox" name="cauliet" value="1" {{ isset($cauhoi) ? ($cauhoi->cauliet ? 'checked' : '') : '' }}>
                </div>
                <div class="form-group">
                    <label>Kích hoạt</label>
                    <input type="hidden" name="active" value="0">
                    <input type="checkbox" name="active" value="1" {{ isset($cauhoi) ? ($cauhoi->active ? 'checked' : '') : '' }}>
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection

@section('script')
<script>
    $(document).ready(function(){
        var options = {
                filebrowserImageBrowseUrl: 'laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: 'laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
                filebrowserBrowseUrl: 'laravel-filemanager?type=Files',
                filebrowserUploadUrl: 'laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
              };
        CKEDITOR.replace('noidung', options);
        CKEDITOR.replace('giaithichdapan', options);
    });
</script>
<link rel="stylesheet" type="text/css" href="css/select2.min.css">
<script src="js/select2.min.js"></script>
<script type="text/javascript" language="javascript" src="admin_asset/ckeditor/ckeditor.js" ></script>
@endsection