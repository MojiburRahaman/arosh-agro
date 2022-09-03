@extends('backend.master')
@section('pages-active')
active
@endsection
@section('pages-add-active')
active
@endsection
@section('pages_dropdown_active')
menu-open
@endsection
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
                    <h1 class="m-0">Add Pages</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
                <form enctype="multipart/form-data" action="{{route('pages.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Page Title</label>
                        <input value="{{old('title')}}" name="title" type="text" placeholder=" Page Title" id="title"
                            autocomplete="none" class="form-control @error('title') is-invalid                                
                            @enderror">
                        @error('title')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="heading">Page Heading</label>
                        <input value="{{old('name')}}" name="heading" type="text" placeholder=" Page Heading" id="name"
                            autocomplete="none" class="form-control @error('heading') is-invalid                                
                            @enderror">
                        @error('heading')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>



                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-8 mt-4 pt-4">
                                <label for="thumbnail_img">Thumbnail Image</label>
                                <input class="form-control @error('thumbnail_img') is-invalid @enderror" type="file"
                                    name="thumbnail_img"
                                    onchange="document.getElementById('image_id').src = window.URL.createObjectURL(this.files[0])">

                                @error('thumbnail_img')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @else
                                <span class="text-danger">Only png,jpeg,jpg formate will allow</span>
                                @enderror
                            </div>


                            <div class="col-4 pl-4">
                                <div>
                                    <label for="image_id">*Thumbnail Preview</label>
                                </div>
                                &nbsp;<img id="image_id" width="150" height="150" />
                            </div>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="editor" class="form-control @error('description') is-invalid @enderror"
                            name="description" id="description"></textarea>
                        @error('description')
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
@include('backend.ckeditor')

<script>


</script>

@endsection