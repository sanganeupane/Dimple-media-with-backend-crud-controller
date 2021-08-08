
@extends('backend.master.master')
@section('content')


    <div class="content-wrapper">
        <section class="content-header">
            <h1>
               Edit Privacy Policy
            </h1>

        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-8">
                                @include('backend.layouts.message')


                                <form action="{{route('edit-admin-privacy-action')}}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="id" value="{{$privacyData->id }}">



                                    <div class="form-group">
                                        <label for=description>Privacy Description</label>
                                        <a style="color:red;">{{$errors->first('description')}}</a>

                                        <textarea type="text" name="description" class="form-control"
                                                  placeholder="Enter Opinion"
                                                  id="description" rows="5" cols="10">{{$privacyData->description}}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-primary">Edit-privacy-policy</button>
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
