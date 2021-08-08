
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


                                <form action="{{route('edit-admin-opinion-action')}}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="id" value="{{$opinionData->id }}">

                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <a style="color:red;">{{$errors->first('title')}}</a>
                                        <input type="text" name="title" class="form-control" placeholder="Title" value="{{$opinionData->title}}"  id="title">
                                    </div>



                                    <div class="form-group">
                                        <label for=description>Description</label>
                                        <a style="color:red;">{{$errors->first('description')}}</a>

                                        <textarea type="text" name="description" class="form-control"
                                                  placeholder="Enter Opinion"
                                                  id="description" rows="5" cols="10">{{$opinionData->description}}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <a style="color:red;">{{$errors->first('image')}}</a>
                                        <input type="file" name="image" class="form-control" placeholder="Your image" value="{{old('image')}}"  id="image">
                                    </div>


                                    <div class="form-group">
                                        <button class="btn btn-primary">Edit-Opinion</button>
                                    </div>


                                </form>



                                <div class="col-md-4">
                                    <img src="{{url('uploads/opinion/'.$opinionData->image)}}" class="img-fluid img-thumbnail" alt="{{$opinionData->name." 's Picture"}}">
                                </div>

                            </div><!-- /.col -->

                        </div><!-- /.col -->
                    </div><!-- ./box-body -->

                </div><!-- /.box -->
            </div>

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->


@endsection
