
@extends('backend.master.master')
@section('content')


    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Terms and Conditions
            </h1>


        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-8">
                                @include('backend.layouts.message')


                                <form action="{{route('edit-admin-termspage-action')}}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="id" value="{{$termsData->id }}">


                                    <div class="form-group">
                                        <label for=description>Add terms & conditions</label>
                                        <a style="color:red;">{{$errors->first('description')}}</a>
                                        <textarea type="text" name="description" class="form-control" placeholder="Enter description"  id="description" rows="5" cols="10">{{$termsData->description }}</textarea>

                                    </div>


                                    <div class="form-group">
                                        <button class="btn btn-primary">Edit terms & conditions</button>
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
