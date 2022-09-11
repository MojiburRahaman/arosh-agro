@extends('backend.master')
@section('site-setting_active')
active
@endsection
@section('courier-active')
active
@endsection
@section('Site_setting_active')
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
                    <h1 class="m-0">Courier Charge</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Courier Charge</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="col-12 m-auto col-lg-6">
                <div class="card card-info">

                    <div class="card-header">
                        <h3 class="card-title">Courier Charge</h3>
                    </div>
                    <form action="{{route('SiteDeliveryPost')}}" method="POST">
                        <div class="card-body">
                            @csrf
                            <div class="from-group mb-4">
                                <label for="">District name</label>
                                <input required name="disctrict_id" class="form-control" placeholder="Rajshahi" disabled
                                    type="text" value="{{ 'Rajshahi' }}">
                            </div>
                            <div class="from-group mb-4">
                                <label for="">Inside Charge</label>
                                <input name="inside" class="form-control" placeholder="inside" type="number"
                                    value="{{ $charge->inside }}">
                            </div>
                            <div class="from-group mb-4">
                                <label for="">Outside Charge</label>
                                <input name="outside" class="form-control" placeholder="Outside" type="number"
                                    value="{{ $charge->outside }}">
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </form>

                </div>


    </section>
</div>

@endsection

@section('script_js')
{{-- @include('backend.ckeditor') --}}
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