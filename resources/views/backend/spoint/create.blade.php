@extends('backend.master')
{{-- @section('product_active')
active
@endsection
@section('product_add-active')
active
@endsection
@section('product_dropdown_active')
menu-open
@endsection --}}
@section('content')

<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice__display {

        padding-left: 20px;
    }

</style>

<div class="content-wrapper">
    <!-- Main content -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Selling Point</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <form enctype="multipart/form-data" action="{{route('spoints.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="p_name">Name of Point</label>
                        <input value="{{old('p_name')}}" name="p_name" type="text"
                            placeholder="Name of Point" id="p_name" autocomplete="none" class="form-control @error('p_name') is-invalid                                
                            @enderror">
                        @error('p_name')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                 
                    <div class="form-group">
                        <label for="mobile">Phone/Mobile</label>
                        <textarea id="mobile"
                            class="form-control @error('mobile') is-invalid @enderror"
                            name="mobile" id="mobile"></textarea>
                        @error('mobile')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
 
  

 
 
                    <div class="form-group">
                        <label for="address">Point Address</label>
                        <textarea id="address"
                            class="form-control @error('address') is-invalid @enderror"
                            name="address" id="address"></textarea>
                        @error('address')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

 
                      <div class="form-group">
                        <label for="location">Google Location Link</label>
                        <input value="{{old('location')}}" name="location" type="text"
                            placeholder="Google Location Link" id="location" autocomplete="none" class="form-control @error('location') is-invalid                                
                            @enderror">
                        @error('location')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>



                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection



@section('script_js')
<script>
    $('#catagory_id').change(function() {
            $catagory_id = $(this).val();
            if ($catagory_id) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('admin/products/get-sub-cat/') }}/" + $catagory_id,
                    success: function(res) {
                        if (res) {
                            $('#subcatagory_id').removeAttr('disabled');
                            $("#subcatagory_id").empty();
                            $("#subcatagory_id").append('<option value=>Select One</option>');
                            $.each(res, function(key, value) {
                                $("#subcatagory_id").append('<option value="' + value.id + '" >' +
                                    value.subcatagory_name + '</option>');
                            });

                        } else {
                            $("#subcatagory_id").empty();
                        }
                    }
                });
            } 
            else {
                 $("#subcatagory_id").empty();
                        }
        });

        

// dynamic add remove function
        $(document).ready(function() {
            var buttonAdd = $("#add-button");
            var buttonRemove = $("#remove-button");
            var className = ".dynamic-field";
            var count = 0;
            var field = "";
            var maxFields = 15;

            function totalFields() {
                return $(className).length;
            }

            function addNewField() {
                count = totalFields() + 1;
                field = $("#dynamic-field-1").clone();
                field.attr("id", "dynamic-field-" + count);
                field.children("label").text("Field " + count);
                field.find("input").val("");
                field.find("select").val("1");
                $(className + ":last").after($(field));
            }

            function removeLastField() {
                if (totalFields() > 1) {
                    $(className + ":last").remove();
                }
            }

            function enableButtonRemove() {
                if (totalFields() === 2) {
                    buttonRemove.removeAttr("disabled");
                    buttonRemove.addClass("shadow-sm");
                }
            }

            function disableButtonRemove() {
                if (totalFields() === 1) {
                    buttonRemove.attr("disabled", "disabled");
                    buttonRemove.removeClass("shadow-sm");
                }
            }

            function disableButtonAdd() {
                if (totalFields() === maxFields) {
                    buttonAdd.attr("disabled", "disabled");
                    buttonAdd.removeClass("shadow-sm");
                }
            }

            function enableButtonAdd() {
                if (totalFields() === (maxFields - 1)) {
                    buttonAdd.removeAttr("disabled");
                    buttonAdd.addClass("shadow-sm");
                }
            }

            buttonAdd.click(function() {
                addNewField();
                enableButtonRemove();
                disableButtonAdd();
            });

            buttonRemove.click(function() {
                removeLastField();
                disableButtonRemove();
                enableButtonAdd();
            });
        });


        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );


</script>

@endsection