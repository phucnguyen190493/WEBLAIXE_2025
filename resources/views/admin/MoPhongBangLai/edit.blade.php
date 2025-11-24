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
                <h1 class="page-header">Mô phỏng - Bằng lái
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

            <form action="{{ isset($mophongbanglai) ? route('admin.mophongbanglai_update', $mophongbanglai->id) : route('admin.mophongbanglai_store') }}" method="POST">
                @csrf
                @if(isset($mophongbanglai))
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label>Mô phỏng</label>
                    <select name="MoPhongId" class="form-select form-control">
                        <option value="">-- Chọn danh mục --</option>
                        @foreach($mophongs as $mophong)
                            <option value="{{ $mophong->id }}"
                            {{ $mophong->id == $mophongbanglai->MoPhongId ? 'selected' : '' }}>
                            {{ $mophong->id }} - {{ $mophong->video }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Bằng lái</label>
                    <select name="BangLaiId" class="form-select form-control">
                        <option value="">-- Chọn danh mục --</option>
                        @foreach($banglais as $banglai)
                            <option value="{{ $banglai->id }}"
                            {{ $banglai->id == $mophongbanglai->BangLaiId ? 'selected' : '' }}>
                            {{ $banglai->id }} - {{ $banglai->ten }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>STT</label>
                    <input type="number" step="1" name="stt" value="{{ $mophongbanglai->stt ?? '' }}" placeholder="Số thứ tự" class="form-control">
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

<link rel="stylesheet" type="text/css" href="css/select2.min.css">
<script src="js/select2.min.js"></script>
<script type="text/javascript" language="javascript" src="admin_asset/ckeditor/ckeditor.js" ></script>
@endsection
