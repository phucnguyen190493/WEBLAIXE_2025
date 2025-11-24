@extends('admin.layout.layout')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Mô phỏng
                    <small>Cập nhật</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-12" style="padding-bottom:70px">
             @if(count($errors) > 0)
             <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                {{ $err }}<br>
                @endforeach
            </div>
            @endif

            <form action="{{ isset($mophong) ? route('admin.mophong_update', $mophong->id) : route('admin.mophong_store') }}" method="POST">
                @csrf
                @if(isset($mophong))
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label>Video</label>
                    <input type="text" name="video" value="{{ $mophong->video ?? '' }}" placeholder="Video" class="form-control">
                </div>
                <div class="form-group">
                    <label>Điểm 5</label>
                    <input type="number" step="1" name="diem5" value="{{ $mophong->diem5 ?? '' }}" placeholder="Điểm 5" class="form-control">
                </div>
                <div class="form-group">
                    <label>Điểm 4</label>
                    <input type="number" step="1" name="diem4" value="{{ $mophong->diem4 ?? '' }}" placeholder="Điểm 4" class="form-control">
                </div>
                <div class="form-group">
                    <label>Điểm 3</label>
                    <input type="number" step="1" name="diem3" value="{{ $mophong->diem3 ?? '' }}" placeholder="Điểm 3" class="form-control">
                </div>
                <div class="form-group">
                    <label>Điểm 2</label>
                    <input type="number" step="1" name="diem2" value="{{ $mophong->diem2 ?? '' }}" placeholder="Điểm 2" class="form-control">
                </div>
                <div class="form-group">
                    <label>Điểm 1</label>
                    <input type="number" step="1" name="diem1" value="{{ $mophong->diem1 ?? '' }}" placeholder="Điểm 1" class="form-control">
                </div>
                <div class="form-group">
                    <label>Điểm 1 min</label>
                    <input type="number" step="1" name="diem1end" value="{{ $mophong->diem1end ?? '' }}" placeholder="Điểm 1 min" class="form-control">
                </div>
                
                <div class="form-group">
                    <label>Kích hoạt</label>
                    <input type="hidden" name="active" value="0">
                    <input type="checkbox" name="active" value="1" {{ isset($mophong) ? ($mophong->active ? 'checked' : '') : '' }}>
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
    });
</script>
<link rel="stylesheet" type="text/css" href="css/select2.min.css">
<script src="js/select2.min.js"></script>
<script type="text/javascript" language="javascript" src="admin_asset/ckeditor/ckeditor.js" ></script>
@endsection
