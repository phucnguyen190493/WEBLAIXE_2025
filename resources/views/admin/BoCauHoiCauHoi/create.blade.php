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
                <h1 class="page-header">Bộ Câu hỏi - Câu hỏi
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

            <form action="{{ route('admin.bochch_store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>STT</label>
                    <input type="number" step="1" name="stt" value="{{ old('stt') }}" placeholder="Số thứ tự" class="form-control">
                </div>
                <div class="form-group">
                    <label>Bộ câu hỏi</label>
                    <select name="BoCauHoiId" class="form-select form-control">
                        <option value="">-- Chọn danh mục --</option>
                        @foreach($bocauhois as $bocauhoi)
                            <option value="{{ $bocauhoi->id }}">
                            {{ $bocauhoi->id }} - {{ $bocauhoi->ten }} - {{ $bocauhoi->BangLai->ten }}
                            </option>
                        @endforeach
                    </select>
                </div>

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

<link rel="stylesheet" type="text/css" href="css/select2.min.css">
<script src="js/select2.min.js"></script>
<script type="text/javascript" language="javascript" src="admin_asset/ckeditor/ckeditor.js" ></script>
@endsection
