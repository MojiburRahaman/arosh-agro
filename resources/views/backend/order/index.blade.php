@extends('backend.master')

@section('content')
<div class="content-wrapper">
    <!-- Main content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Order</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Orders</li>
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
                <div class="card-body table-responsive p-0">
                    <table style="overflow-x:auto;" class="table  text-nowrap" id="order_table">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Order Number</th>
                                <th>Order Time </th>
                                <th class="text-center">Total Amount</th>
                                <th class="text-center">Delivery Status</th>
                                <th>Details</th>
                                <th>Cancel</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$order->order_number}}</td>
                                <td>{{$order->created_at->diffForHumans()}}</td>
                                <td class="text-center">৳{{$order->subtotal}}</td>
                                <td class="text-center">
                                    @if($order->cancel != '')
                                    <a class="badge badge-danger">Order Canceled</a>

                                    @elseif ($order->delivery_status == 1)
                                    <a href="{{route('DeliveryStatus',$order->id)}}"
                                        class="btn-sm btn-danger">pending</a>
                                    @elseif ($order->delivery_status == 2)
                                    <a href="{{route('DeliveryStatus',$order->id)}}" class="btn-sm btn-warning">On The
                                        way</a>
                                    @else
                                    <a class="btn-sm btn-success">Deliverd</a>

                                    @endif
                                </td>
                                <td>
                                    <a class="btn-sm btn-primary" href="{{route('orders.show',$order->id)}}">Details</a>
                                    <a class="btn-sm btn-success" href="{{route('InvoiceDownload',$order->id)}}"><i
                                            class="fa fa-download"></i></a>
                                </td>
                                <td class="text-center">
                                    @if($order->cancel != '')
                                        
                                    <a href="{{ route('OrderCancel',$order->id) }}"
                                        onclick="return confirm('Are you sure you would like to undo  this order?');"
                                        class="badge badge-info" href="">Undo
                                    </a>
                                    @else
                                    <a href="{{ route('OrderCancel',$order->id) }}"
                                        onclick="return confirm('Are you sure you would like to cancel  this order?');"
                                        class="btn-sm btn-danger text-light" href="">X
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="10">No Record</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('script_js')


<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/autofill/2.4.0/js/dataTables.autoFill.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script>
    function geek() {
            confirm("Press OK to close this option");
        };

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


// $(document).ready( function () {
//     $('#order_table').DataTable();
// } );
$(document).ready(function() {
    $('#order_table').DataTable( {
        dom: 'Bfrtip',
        autoFill: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf',
        ]
    } );
} );

</script>
@endsection