
@extends('backend.master.master')
@section('content')


    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Add contact
            </h1>

        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-8">
                                @include('backend.layouts.message')


                                <form action="{{route('add-contact')}}" method="post" enctype="multipart/form-data">
                                    @csrf



                                    <div class="form-group">
                                        <label for=address>Address</label>
                                        <a style="color:red;">{{$errors->first('address')}}</a>
                                        <input type="text" name="address" class="form-control" placeholder="Enter address" value="{{old('address')}}"  id="address">
                                    </div>

                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <a style="color:red;">{{$errors->first('city')}}</a>
                                        <input type="text" name="city" class="form-control" placeholder="city" value="{{old('city')}}"  id="city">
                                    </div>


                                    <div class="form-group">
                                        <label for=country>Country</label>
                                        <a style="color:red;">{{$errors->first('country')}}</a>
                                        <input type="text" name="country" class="form-control" placeholder="country" value="{{old('country')}}"  id="country">
                                    </div>




                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <a style="color:red;">{{$errors->first('email')}}</a>
                                        <input type="text" name="email" class="form-control" placeholder="Your email" value="{{old('email')}}"  id="email">
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">Phone Number</label>
                                        <a style="color:red;">{{$errors->first('phone')}}</a>
                                        <input type="number" name="phone" class="form-control" placeholder="Your phone" value="{{old('phone')}}"  id="phone">
                                    </div>


                                    <div class="form-group">
                                        <button class="btn btn-success">Add-contact</button>
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
