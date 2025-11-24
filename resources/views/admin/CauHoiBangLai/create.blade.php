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
                <h1 class="page-header">Câu hỏi - Bằng lái
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

            <form action="{{ route('admin.cauhoibanglai_store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Câu hỏi</label>
                    <select name="CauHoiId" class="form-select form-control">
                        <option value="">-- Chọn danh mục --</option>
                        @foreach($cauhois as $cauhoi)
                            <option value="{{ $cauhoi->id }}">
                            Câu {{ $cauhoi->stt }} - {{ Str::limit(strip_tags($cauhoi->noidung), 50, ' [...]') }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Bằng lái</label>
                    <select name="BangLaiId" class="form-select form-control">
                        <option value="">-- Chọn danh mục --</option>
                        @foreach($banglais as $banglai)
                            <option value="{{ $banglai->id }}">
                            {{ $banglai->id }} - {{ $banglai->ten }}
                            </option>
                        @endforeach
                    </select>
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

<link rel="stylesheet" type="text/css" href="css/select2.min.css">
<script src="js/select2.min.js"></script>
<script type="text/javascript" language="javascript" src="admin_asset/ckeditor/ckeditor.js" ></script>
@endsection
