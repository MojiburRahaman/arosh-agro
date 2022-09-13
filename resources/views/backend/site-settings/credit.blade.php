@extends('backend.master')
@section('site-setting_active')
active
@endsection
@section('credit-active')
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
                    <h1 class="m-0">Credit</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Credit</li>
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
                        <h3 class="card-title">Credit</h3>
                    </div>
                    <form action="{{route('SiteCreditPost')}}" method="POST">
                        <div class="card-body">
                            @csrf
                            <div class="from-group mb-4">
                                <label for="">Credit Deposit Amount</label>
                                <input name="credit" class="form-control" placeholder="Credit Deposit Amount"
                                    type="number" value="{{ $charge->credit_amount }}">
                            </div>
                            <div class="from-group mb-4">
                                <label for="">Purchase Amount</label>
                                <input name="purchase_amount" class="form-control" placeholder="Purchase Amount"
                                    type="number" value="{{ $charge->purchase_amount }}">
                            </div>
                            <div class="from-group ">
                                <input type="checkbox" {{ ($charge->status == 2) ? 'checked' : '' }} name="status"
                                id="status" value="2">
                                <label for="status">Active</label>
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