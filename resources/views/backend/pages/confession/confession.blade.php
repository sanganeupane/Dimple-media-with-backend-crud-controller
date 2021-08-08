
@extends('backend.master.master')
@section('content')


    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Add Confession
            </h1>

        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-8">
                                @include('backend.layouts.message')


                                <form action="{{route('addConfession')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <a style="color:red;">{{$errors->first('title')}}</a>
                                        <input type="text" name="title" class="form-control" placeholder="Title" value="{{old('title')}}"  id="title">
                                    </div>



                                    <div class="form-group">
                                        <label for="address">Choose Address</label><br>
                                        <a style="color:red;">{{$errors->first('address')}}</a>
                                        <select name="address" id="address">
                                            <option selected disabled value="">
                                                Choose...
                                            </option>
                                            <option>jhapa</option>
                                            <option>nuwakot</option>
                                            <option>kathmandu</option>
                                            <option>pokhara</option>
                                            <option>chitwan</option>
                                        </select>
                                    </div>
                                    <br>



                                    <div class="form-group">
                                        <label>Choose Gender</label>

                                        <a style="color:red;">{{$errors->first('gender')}}</a>
                                        <div class="form-check">
                                            <label for="gender">Male</label>
                                            <input type="radio" value="male" name="gender"
                                                   id="gender">
                                        </div>
                                        <div class="form-check">
                                            <label  for="gender">  Female</label>
                                            <input type="radio" value="female" name="gender"
                                                   id="gender">
                                        </div>
                                    </div>
                                    <br>




                                    <div class="form-group">
                                        <label for="age">Age</label><br>
                                        <a style="color:red;">{{$errors->first('age')}}</a>
                                        <select name="age" id="age">
                                            <option selected disabled value="">
                                                Choose age ...
                                            </option>
                                          @for ($i = 16; $i < 60; $i++)
                                                <option>   {{ $i }}</option>
                                                @endfor
                                        </select>
                                    </div>
                                    <br>




                                    <div class="form-group">
                                        <label for=description>Description</label>
                                        <a style="color:red;">{{$errors->first('description')}}</a>
                                        <textarea type="text" name="description" class="form-control" placeholder="Enter anything you like" value="{{old('description')}}"  id="description"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <a style="color:red;">{{$errors->first('image')}}</a>
                                        <input type="file" name="image" class="form-control" placeholder="Your image" value="{{old('image')}}"  id="image">
                                    </div>


                                    <div class="form-group">
                                        <button class="btn btn-success">Add-Confession</button>
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
