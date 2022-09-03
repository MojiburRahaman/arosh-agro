@extends('backend.master')
{{-- @section('product_active')
active
@endsection
@section('product_view-active')
active
@endsection
@section('product_dropdown_active')
menu-open
@endsection --}}
@section('content')
<div class="content-wrapper">
    <!-- Main content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Services</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Services</li>
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
              <table id="example1" class="table table-bordered table-striped ">
                        <thead>
                        <tr>
                            <th>SI</th>
                            <th>Name of Service</th>
                            <th>Image</th>
                            <th>Action</th>
                         
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($services as $key => $service)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$service->heading}}</td>
                                               <td>
                    <img src="{{asset('service_image/' . $service->service_image)}}" width="60" height="60"
                        alt="{{$service->heading}}">
                    &nbsp;&nbsp;

                </td>
               <form action="{{route('services.destroy',$service->id)}}" method="post">
                    
 
                    <td>
                   
                        <a style="padding: 7px 8px" href="{{route('services.edit',$service->id)}}"
                            class="btn-sm btn-primary">Edit</a>
                   
                        @csrf
                    
                        @method('delete')
                        <button class="btn-sm btn-danger" type="submit">Delete</button>
                 
                </form>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                               <th>SI</th>
                            <th>Name of Service</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
 
 
 
          
                <td class="text-center" colspan="10">No Data Available</td>
       
       
       
            </div>
            <div class="text-right mt-2">
                {{$services->links()}}
            </div>
            <!-- /.card -->
        </div>
 
</section>
</div>
@endsection
@section('script_js')
<script>
$(document).ready( function () {
    $('#order_table').DataTable();
} );

    $("#select_all").click(function(){
        $("input[class=checkbox]").prop('checked', $(this).prop('checked'));

    });

$('#select_all').click(function () {
        //check if checkbox is checked
        if ($(this).is(':checked')) {

            $('#select_btn').removeAttr('disabled'); //enable input

        } 
        else {
            $('#select_btn').attr('disabled', true); //disable input
        }
    });
$('.checkbox').click(function () {
        //check if checkbox is checked
        if ($(this).is(':checked')) {
            $('#select_btn').removeAttr('disabled'); //enable input

        } 
        // else {
        //     $('#select_btn').attr('disabled', true); //disable input
        // }
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