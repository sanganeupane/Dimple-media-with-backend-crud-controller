
@extends('backend.master.master')
@section('content')


    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Our Team
            </h1>

        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-8">
                                @include('backend.layouts.message')


                                <form action="{{route('edit-admin-ourteam-action')}}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="id" value="{{$ourteamData->id }}">

                                    <div class="form-group">
                                        <label for="name">Full Name</label>
                                        <a style="color:red;">{{$errors->first('name')}}</a>
                                        <input type="text" name="name" class="form-control" placeholder="name" value="{{$ourteamData->name}}"  id="name">
                                    </div>


                                    <div class="form-group">
                                        <label for=post>Post</label>
                                        <a style="color:red;">{{$errors->first('post')}}</a>
                                        <input type="text" name="post" class="form-control" placeholder="Enter Post" value="{{$ourteamData->post}}"  id="post">
                                    </div>





                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <a style="color:red;">{{$errors->first('image')}}</a>
                                        <input type="file" name="image" class="form-control" placeholder="Your image"  id="image">
                                    </div>


                                    <div class="form-group">
                                        <button class="btn btn-success">Edit-Team-member</button>
                                    </div>


                                </form>


                            </div><!-- /.col -->

                            <div class="col-md-4">
                                <img src="{{url('uploads/ourteam/'.$ourteamData->image)}}" class="img-fluid img-thumbnail">
                            </div>

                        </div><!-- /.col -->
                    </div><!-- ./box-body -->

                </div><!-- /.box -->
            </div>

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->


@endsection
