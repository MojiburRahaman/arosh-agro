@extends('backend.master')
@section('site-setting_active')
active
@endsection
@section('banner-active')
active
@endsection
@section('color-Site_setting_active')
menu-open
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Main content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Banner</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Banner</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                {{-- <form action="{{route('Markdeletebrand')}}" method="post"> --}}
                    {{-- @csrf --}}
                    {{-- @can('Create Color') --}}

                    <div class="text-right">

                        <a data-toggle="modal" data-target="#exampleModal" class="btn-sm btn-info">Add Banner</a>
                    </div>
                    {{-- @endcan --}}
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th class="text-center">Banner Preview</th>
                                    <th>Banner Text</th>
                                    <th>Created At</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($banners as $banner)

                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td  class="text-center">
                                        <img src="{{asset('banner_image/'.$banner->banner_image)}}" width="25%" alt="">
                                    </td>
                                    <td>{!! $banner->banner_text !!}</td>
                                    <td>{{$banner->created_at->diffForHumans()}}</td>
                                    <td>
                                        @if ($banner->status == 1)
                                        <a href="{{route('SiteBannerStatus',$banner->id)}}"
                                            class="btn-sm btn-primary">Active</a>
                                        @else
                                        <a href="{{route('SiteBannerStatus',$banner->id)}}"
                                            class="btn-sm btn-warning">Inactive</a>
                                        @endif
                                        <a href="{{route('SiteBannerDelete',$banner->id)}}"
                                            class="ml-2 btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @empty
                                <td class="text-center" colspan="10">No Data Available</td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Banner</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{route('SiteBannerPost')}}" method="POST"
                                        enctype="multipart/form-data">
                                        <div class="modal-body">
                                            @csrf
                                            <div class="from-group mb-4">
                                                <label for="">Banner Image</label>
                                                <input required name="banner_image" class="form-control" type="file">
                                            </div>
                                            <div class="from-group">
                                                <label for="editor">Banner Text</label>
                                                <textarea name="banner_text" id="editor"
                                                    class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Save </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
    </section>
</div>

@endsection

@section('script_js')
@include('backend.ckeditor')
<script>
    $(document).ready(function() {
    $('.product_id').select2();
});


    @if (session('delete')) 
Command: toastr["error"]("{{session('delete')}}")

toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": true,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
@endif
@if (session('success')) 
Command: toastr["success"]("{{session('success')}}")

toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": true,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
@endif
@if (session('warning')) 
Command: toastr["warning"]("{{session('warning')}}")

toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": true,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
@endif

</script>
@endsection