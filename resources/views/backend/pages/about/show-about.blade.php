@extends('backend.master.master')
@section('content')

    <div class="content-wrapper">
        <section class="content-header">

        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-8">

                            @include('backend.layouts.message')

                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Description</th>
                                    <th>Image/Video</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($aboutData as $key=>$about)
                                    <tr>
                                        <td>{{++$key}}</td>

                                        <td>{{$about->description}}</td>
                                        <td>
                                            <img src="{{url('uploads/about/'.$about->image)}}" width="28px" alt="">
                                        </td>
                                        <td>{{$about->created_at}}</td>

                                        <td>
                                            <a href="{{route('edit-admin-about').'/'.$about->id}}">
                                                <button class="btn-xs btn-danger" name="criteria"><i
                                                        class="fa fa-edit"></i>
                                                </button>
                                            </a>
                                            <a href="{{route('delete-admin-about-action').'/'.$about->id}}">
                                                <button class="btn-xs btn-primary" name="criteria"><i
                                                        class="fa fa-trash"></i>
                                                </button>

                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$aboutData->links()}}

                        </div>

                    </div>
                </div>
            </div>

        </section>
    </div>

@endsection
