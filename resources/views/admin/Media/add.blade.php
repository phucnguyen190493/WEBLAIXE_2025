@extends('admin.layout.layout')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Hình ảnh
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
            @if(session('errfile'))
                <div class="alert alert-danger">
                    <strong>{{session('errfile')}}</strong>
                </div>
            @endif

         @if ($message = Session::get('success'))
             <div class="alert alert-success alert-block">
                 <button type="button" class="close" data-dismiss="alert">×</button>
                 <strong>{{ $message }}</strong>
             </div>
             <img src="images/cauhoi/{{ Session::get('image') }}" class="img-thumbnail" style="width: 100%; max-width: 30%">
             <a href="{{ Session::get('path')}}" target="_blank">{{ Session::get('path')}}</a>
         @endif

         <form action="{{ route('admin.media.upload.post') }}" method="POST" enctype="multipart/form-data">
             @csrf
             <div class="row">

                 <div class="form-group">
                     <input type="file" name="image" class="form-control">
                 </div>
                <div class="form-group">
                    <label>Note</label>
                    <input type="text" name="note" value="{{ old('note') }}" placeholder="Ghi chú" class="form-control">
                </div>
                 <div class="col-md-6">
                     <button type="submit" class="btn btn-success">Upload</button>
                 </div>

             </div>
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
        CKEDITOR.replace('demo', options);
    });
</script>
<link rel="stylesheet" type="text/css" href="css/select2.min.css">
<script src="js/select2.min.js"></script>
@endsection
