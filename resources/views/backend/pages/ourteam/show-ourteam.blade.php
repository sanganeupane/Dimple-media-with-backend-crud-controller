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
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Post</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($ourteamData as $key=>$ourteam)
                                    <tr>
                                        <td>{{++$key}}</td>

                                        <td>{{$ourteam->name}}</td>
                                        <td>
                                            <img src="{{url('uploads/ourteam/'.$ourteam->image)}}" width="28px" alt="">
                                        </td>
                                        <td>{{$ourteam->post}}</td>
                                        <td>{{$ourteam->created_at}}</td>

                                        <td>
                                            <a href="{{route('edit-admin-ourteam').'/'. $ourteam->id}}">
                                                <button class="btn-xs btn-danger" name="criteria"><i
                                                        class="fa fa-edit"></i>
                                                </button>
                                            </a>
                                            <a href="{{route('delete-admin-ourteam').'/'. $ourteam->id}}">
                                                <button class="btn-xs btn-primary" name="criteria"><i
                                                        class="fa fa-trash"></i>
                                                </button>

                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$ourteamData->links()}}

                        </div>

                    </div>
                </div>
            </div>

        </section>
    </div>

@endsection
