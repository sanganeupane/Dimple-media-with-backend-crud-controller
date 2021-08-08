
@extends('backend.master.master')
@section('content')


    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Edit About
            </h1>

        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-8">
                                @include('backend.layouts.message')

                                <form action="{{route('edit-admin-about-action')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$aboutData->id }}">


                                    <div class="form-group">
                                        <label for=description>Description</label>
                                        <a style="color:red;">{{$errors->first('description')}}</a>
                                        <textarea type="text" name="description" class="form-control" placeholder="Enter anything you like"   id="description" rows="5" cols="10">{{$aboutData->description}}</textarea>
                                    </div>




                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <a style="color:red;">{{$errors->first('image')}}</a>
                                        <input type="file" name="image" class="form-control" placeholder="Your image" value="{{old('image')}}"  id="image">
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-success">Edit-About</button>
                                    </div>


                                </form>


                            </div><!-- /.col -->

                            <div class="col-md-4">
                                <img src="{{url('uploads/about/'.$aboutData->image)}}" class="img-fluid img-thumbnail" alt="{{$aboutData->name." 's Picture"}}">
                            </div>


                        </div><!-- /.col -->
                    </div><!-- ./box-body -->

                </div><!-- /.box -->
            </div>

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->


@endsection
