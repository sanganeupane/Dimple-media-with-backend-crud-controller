
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
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Country</th>
                                    <th>E-mail</th>
                                    <th>Phone</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>




                                @foreach($contactData as $key=>$contact)
                                    <tr>
                                        <td>{{++$key}}</td>

                                        <td>{{$contact->address}}</td>
                                        <td>{{$contact->city}}</td>
                                        <td>{{$contact->country}}</td>
                                        <td>{{$contact->email}}</td>
                                        <td>{{$contact->phone}}</td>
                                        <td>{{$contact->created_at}}</td>

                                           <td> <a href="{{route('edit-admin-contact').'/'.$contact->id}}">
                                                <button class="btn-xs btn-danger" name="criteria" ><i class="fa fa-edit"></i>
                                                </button>
                                            </a>
                                            <a href="{{route('delete-admin-contact').'/'.$contact->id}}">
                                                <button class="btn-xs btn-primary" name="criteria"><i class="fa fa-trash"></i>
                                                </button>

                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{-- {{$contactData->links()}} --}}

                        </div>

                    </div>
                </div>
            </div>

        </section>
    </div>

@endsection
