
@extends('backend.master.master')
@section('content')


    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Add Opinion
            </h1>

        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-8">
                                @include('backend.layouts.message')


                                <form action="{{route('add-opinion')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <a style="color:red;">{{$errors->first('title')}}</a>
                                        <input type="text" name="title" class="form-control" placeholder="Title" value="{{old('title')}}"  id="title">
                                    </div>



                                    <div class="form-group">
                                        <label for=description>Description</label>
                                        <a style="color:red;">{{$errors->first('description')}}</a>
                                        <textarea type="text" name="description" class="form-control" placeholder="Enter anything you like" value="{{old('description')}}"  id="description"></textarea>
                                    </div>


                                    <div class="form-group">
                                        <label for=image>Image</label>
                                        <a style="color:red;">{{$errors->first('image')}}</a>
                                        <input type="file" name="image" class="form-control" placeholder="Enter anything you like" value="{{old('image')}}"  id="image">
                                    </div>



                                    <div class="form-group">
                                        <button class="btn btn-success">Add-Opinion</button>
                                    </div>


                                </form>


                            </div><!-- /.col -->

                        </div><!-- /.col -->
                    </div><!-- ./box-body -->

                </div><!-- /.box -->
            </div>

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->


@endsection
