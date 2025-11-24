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
                <h1 class="page-header">Hình ảnh
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

            <form action="{{ isset($hinhanh) ? route('admin.hinhanh_update', $hinhanh->id) : route('admin.hinhanh_store') }}" method="POST">
                @csrf
                @if(isset($hinhanh))
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label>Câu hỏi</label>
                    <select name="CauHoiId" class="form-select form-control">
                        <option value="">-- Chọn danh mục --</option>
                        @foreach($cauhois as $cauhoi)
                            <option value="{{ $cauhoi->id }}"
                            {{ $cauhoi->id == $hinhanh->CauHoiId ? 'selected' : '' }}>
                            Câu {{ $cauhoi->stt }} - {{ Str::limit(strip_tags($cauhoi->noidung), 50, ' [...]') }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>STT</label>
                    <input type="number" step="1" name="stt" value="{{ $hinhanh->stt ?? '' }}" placeholder="Số thứ tự" class="form-control">
                </div>
                <div class="form-group">
                    <label>Media</label>
                    <select name="MediaId" class="form-select form-control">
                        <option value="">-- Chọn danh mục --</option>
                        @foreach($medias as $media)
                            <option value="{{ $media->id }}" {{ $media->id == $hinhanh->MediaId ? 'selected' : '' }}>
                            {{ $media->id }} - {{ $media->name }} - {{ $media->note }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Nội dung</label>
                    <textarea name="noidung" id="noidung" class="form-control ckeditor" rows="3">{{ $hinhanh->noidung }}</textarea>
                </div>
                <div class="form-group">
                    <label>Kích hoạt</label>
                    <input type="hidden" name="active" value="0">
                    <input type="checkbox" name="active" value="1" {{ isset($hinhanh) ? ($hinhanh->active ? 'checked' : '') : '' }}>
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
