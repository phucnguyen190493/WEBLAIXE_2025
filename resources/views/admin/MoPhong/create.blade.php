@php
  use Illuminate\Support\Str;
@endphp

@extends('admin.layout.layout')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Mô phỏng
                    <small>Thêm</small>
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

            <form action="{{ route('admin.mophong_store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Video</label>
                    <input type="text" name="video" value="{{ old('video') }}" placeholder="Video" class="form-control">
                </div>
                <div class="form-group">
                    <label>Điểm 5 (giây)</label>
                    <input type="number" step="1" name="diem5" value="{{ old('diem5') }}" placeholder="Điểm 5" class="form-control">
                </div>
                <div class="form-group">
                    <label>Điểm 4 (giây)</label>
                    <input type="number" step="1" name="diem4" value="{{ old('diem4') }}" placeholder="Điểm 4" class="form-control">
                </div>
                <div class="form-group">
                    <label>Điểm 3 (giây)</label>
                    <input type="number" step="1" name="diem3" value="{{ old('diem3') }}" placeholder="Điểm 3" class="form-control">
                </div>
                <div class="form-group">
                    <label>Điểm 2 (giây)</label>
                    <input type="number" step="1" name="diem2" value="{{ old('diem2') }}" placeholder="Điểm 2" class="form-control">
                </div>
                <div class="form-group">
                    <label>Điểm 1 (giây)</label>
                    <input type="number" step="1" name="diem1" value="{{ old('diem1') }}" placeholder="Điểm 1" class="form-control">
                </div>
                <div class="form-group">
                    <label>Điểm 1 min (giây)</label>
                    <input type="number" step="1" name="diem1end" value="{{ old('diem1end') }}" placeholder="Điểm 1 min" class="form-control">
                </div>
                <div class="form-group">
                    <label>Kích hoạt</label>
                    <input type="hidden" name="active" value="0">
                    <input type="checkbox" name="active" value="1" {{ old('active') ? 'checked' : '' }}>
                </div>
                <button type="reset" class="btn btn-default">Làm Mới</button>
                <button type="submit" class="btn btn-primary">Lưu</button>
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
    });
</script>
<link rel="stylesheet" type="text/css" href="css/select2.min.css">
<script src="js/select2.min.js"></script>
<script type="text/javascript" language="javascript" src="admin_asset/ckeditor/ckeditor.js" ></script>
@endsection
