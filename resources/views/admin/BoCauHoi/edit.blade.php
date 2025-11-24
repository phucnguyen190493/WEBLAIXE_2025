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
                <h1 class="page-header">Bộ câu hỏi
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

            <form action="{{ isset($bch) ? route('admin.bocauhoi_update', $bch->id) : route('admin.bocauhoi_store') }}" method="POST">
                @csrf
                @if(isset($bch))
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label>STT</label>
                    <input type="number" step="1" name="stt" value="{{ $bch->stt ?? '' }}" placeholder="Số thứ tự" class="form-control">
                </div>
                <div class="form-group">
                    <label>Tên</label>
                    <input type="text" name="ten" value="{{ $bch->ten ?? '' }}" placeholder="Tên" class="form-control">
                </div>
                <div class="form-group">
                    <label>Bằng lái</label>
                    <select name="BangLaiId" class="form-select form-control">
                        <option value="">-- Chọn danh mục --</option>
                        @foreach($banglais as $banglai)
                            <option value="{{ $banglai->id }}"
                            {{ $banglai->id == $bch->BangLaiId ? 'selected' : '' }}>
                            {{ $banglai->id }} - {{ $banglai->ten }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Kích hoạt</label>
                    <input type="hidden" name="active" value="0">
                    <input type="checkbox" name="active" value="1" {{ isset($bch) ? ($bch->active ? 'checked' : '') : '' }}>
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
