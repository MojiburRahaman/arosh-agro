@extends('backend.master')
@section('pages_active')
active
@endsection
@section('pages-active')
active
@endsection
@section('pages_dropdown_active')
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
                    <h1 class="m-0">Pages</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Pages</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="col-12 text-right mb-2 pr-2">
            @can('Pages Create')
            <a href="{{ route('pages.create') }}" class="btn-sm btn-dark">Add Pages <i class="fa fa-plus"></i> </a>
            @endcan
        </div>
        <div class="container-fluid">
            <div class="col-12">
                <table id="example1" class="table table-bordered table-striped ">
                    <thead>
                        <tr>
                            <th>SI</th>
                            <th>Page Name</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pages as $key => $page)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$page->title}}</td>
                            <td>
                                @if ($page->status == 1)
                                <a href="{{ route('pages.show',$page->id) }}" class="btn-sm btn-success">Active</a>

                                @else
                                <a href="{{ route('pages.show',$page->id) }}" class="btn-sm btn-warning">Inactive</a>

                                @endif

                            </td>
                            <form action="{{route('pages.destroy',$page->id)}}" method="post">
                                <td>
                                    <a title="view" target="_blank" style="padding: 7px 8px"
                                        href="{{route('DynamicPage',$page->slug)}}" class="btn-sm btn-dark "> <i
                                            class="fa fa-eye"></i> </a>
                                    @can('Pages Edit')
                                    <br>
                                    <br>
                                    <a style="padding: 7px 8px" href="{{route('pages.edit',$page->id)}}"
                                        class="btn-sm btn-primary "><i class="fa fa-pen"></i></a>
                                    @endcan
                                    @csrf
                                    @can('Pages Delete')
                                    <br>
                                    <br>
                                    @method('delete')
                                    <button class="btn-sm btn-danger mb-2" type="submit">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    @endcan
                            </form>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-center" colspan="10">No Pages </td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>

            </div>
        </div>

    </section>
</div>
@endsection
@section('script_js')
<script>
    $(document).ready( function () {
    $('#order_table').DataTable();
} );


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