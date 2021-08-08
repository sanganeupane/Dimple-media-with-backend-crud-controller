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
                            <form action="">
                                <div class="row">
                                    <div class="form-group">
                                        @csrf
                                        <input type="text" name="search" class="form-control"
                                               placeholder="Search admin users">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary">Search</button>
                                    </div>

                                </div>
                            </form>

                            @include('backend.layouts.message')

                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Title</th>
                                    <th>Address</th>
                                    <th>Gender</th>
                                    <th>Age</th>
                                    <th>Image</th>

                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($confenssionData as $key=>$confessions)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$confessions->title}}</td>
                                        <td>{{$confessions->address}}</td>
                                        <td>{{$confessions->gender}}</td>
                                        <td>{{$confessions->age}}</td>
                                        <td>
                                            <img src="{{url('uploads/confession/'.$confessions->image)}}" width="28px" alt="">
                                        </td>                                        <td>{!!$confessions->description!!}</td>
                                        <td>{{$confessions->created_at}}</td>


                                        <td>

                                            <a href=" {{route('edit-admin-confession').'/'.$confessions->id}}">
                                                <button class="btn-xs btn-danger" name="criteria"><i
                                                        class="fa fa-edit"></i>
                                                </button>
                                            </a>
                                            <a href="{{route('delete-admin-confession').'/'.$confessions->id}}">
                                                <button class="btn-xs btn-primary" name="criteria"><i
                                                        class="fa fa-trash"></i>
                                                </button>

                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $confenssionData->links() }}
                        </div>

                    </div>
                </div>
            </div>

        </section>
    </div>

@endsection
