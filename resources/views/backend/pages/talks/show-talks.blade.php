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
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($talksData as $key=>$talks)
                                    <tr>
                                        <td>{{++$key}}</td>

                                        <td>{{$talks->title}}</td>
                                        <td>{{$talks->description}}</td>
                                        <td>
                                            <img src="{{url('uploads/talks/'.$talks->image)}}" width="28px" alt="">
                                        </td>
                                        <td>{{$talks->created_at}}</td>

                                        <td>
                                            <a href="{{route('edit-admin-talks').'/'.$talks->id}}">
                                                <button class="btn-xs btn-danger" name="criteria"><i
                                                        class="fa fa-edit"></i>
                                                </button>
                                            </a>
                                            <a href="{{route('delete-admin-talks').'/'.$talks->id}}">
                                                <button class="btn-xs btn-primary" name="criteria"><i
                                                        class="fa fa-trash"></i>
                                                </button>

                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$talksData->links()}}

                        </div>

                    </div>
                </div>
            </div>

        </section>
    </div>

@endsection
