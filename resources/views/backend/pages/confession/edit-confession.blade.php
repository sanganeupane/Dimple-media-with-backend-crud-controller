@extends('backend.master.master')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">

        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-8">
                                @include('backend.layouts.message')

                                <form action="{{route("edit-admin-confession-action")}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$confessionData->id }}">


                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <a style="color:red;">{{$errors->first('title')}}</a>
                                        <input type="text" name="title" class="form-control" placeholder="Title"
                                               value="{{$confessionData->title}}" id="title">
                                    </div>


                                    <div class="form-group">
                                        <label for="address">Choose Address</label><br>
                                        <a style="color:red;">{{$errors->first('address')}}</a>
                                        <select name="address" id="address" value="{{$confessionData->address}}">
                                            <option>
                                                {{$confessionData->address}}
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
                                            {{--                                            <input type="radio" value="male" name="gender"--}}
                                            {{--                                                   id="gender">--}}
                                            <input type="radio" name="gender"
                                                   value="male" {{ $confessionData->gender == "male" ? 'checked' : '' }} />

                                        </div>

                                        <div class="form-check">
                                            <label for="gender"> Female</label>

                                            <input type="radio" name="gender"
                                                   value="female" {{ $confessionData->gender == "female" ? 'checked' : '' }} />


                                            {{--                                            <input type="radio" value="female" name="gender"--}}
                                            {{--                                                   id="gender">--}}
                                        </div>
                                    </div>
                                    <br>


                                    <div class="form-group">
                                        <label for="age">Age</label><br>
                                        <a style="color:red;">{{$errors->first('age')}}</a>
                                        <select name="age" id="age">
                                            <option>
                                                {{$confessionData->age}}
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

                                        <textarea type="text" name="description" style="height:150px; width:700px" ;
                                                  placeholder="Enter anything you like"
                                                  value=""

                                                  id="description" rows="5"
                                                  cols="10">{{$confessionData->description}}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <a style="color:red;">{{$errors->first('image')}}</a>
                                        <input type="file" name="image" class="form-control" placeholder="Your image" value="{{old('image')}}"  id="image">
                                    </div>


                                    <div class="form-group">
                                        <button class="btn btn-primary">Edit-Confession</button>
                                    </div>


                                </form>



                                <div class="col-md-4">
                                    <img src="{{url('uploads/confession/'.$confessionData->image)}}" class="img-fluid img-thumbnail" alt="{{$confessionData->name." 's Picture"}}">
                                </div>
                            </div><!-- /.col -->

                        </div><!-- /.col -->
                    </div><!-- ./box-body -->

                </div><!-- /.box -->
            </div>

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->


    </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    </section>
    </div>

@endsection
