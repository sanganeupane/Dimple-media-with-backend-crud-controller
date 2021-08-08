
@extends('backend.master.master')
@section('content')


    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Privacy Policy
            </h1>

        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-8">
                                @include('backend.layouts.message')


                                <form action="{{route('add-privacy')}}" method="post" enctype="multipart/form-data">
                                    @csrf



                                    <div class="form-group">
                                        <label for=description>Privacy Description</label>
                                        <a style="color:red;">{{$errors->first('description')}}</a>
                                        <textarea type="text" name="description" class="form-control" placeholder="Enter description" value="{{old('description')}}"  id="description"></textarea>
                                    </div>


                                    <div class="form-group">
                                        <button class="btn btn-danger">Add-privacy-policy</button>
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
