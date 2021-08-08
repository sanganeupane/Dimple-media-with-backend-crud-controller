@extends('frontend/master/master')

@section('about')


    <div class="main-content">

        <section id="pageBanner" style="background-image: url('frontend/img/homebg.jpg');">
            <div class="container">
                <div class="page-title">
                    Confession
                </div>
            </div>
        </section>

        <section id="confessionList" class="page-padd">
            <div class="container">
                <div class="search-bar mb-4">
                    <div class="row">
                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                            <form id="confessionSearch">
                                <input type="text" name="search" placeholder="Search Confession...">
                                <button type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="confession-grid">

                    <div class="row">
                        @foreach($confessionData as $key=>$confessions)

                            <div class="col-md-6">
                                <div class="confession-block">


                                    <div class="talk-block">
                                        <div class="video-wrapper">
                                            <img src="{{url('uploads/confession/'.$confessions->image)}}" height="400px" width="400px" )>
                                        </div>
                                    </div>


                                    <div class="confession-title">
                                        <td>{{$confessions->title}}</td>
                                    </div>


                                    <div class="confession-block-age-date">
                                        <div class="confession-block-age-gender">

                                            <td>Age {{ $confessions->age}}</td>
                                            ,
                                            <td> {{ucfirst( $confessions->gender)}}</td>

                                            <td>[{{ucfirst($confessions->address)}}]</td>
                                        </div>
                                        <div class="confession-block-date">
                                            {{ $confessions->created_at->format('M d , Y')}}
                                        </div>

                                    </div>


                                    <div class="confession-block-msg-excerpt">
                                        <td>{{substr($confessions->description,0,500)}}</td>


                                    </div>
                                    <a class="confession-block-btn"
                                       href="{{route('singleconfession').'/'.$confessions->id}}">Read Full
                                        Confession</a>
                                </div>
                            </div>

                            {{--                            </div>--}}
                        @endforeach


                    </div>
                </div>
                <div class="text-center my-3">
                    {{--                    Pagination Here--}}
                    {{$confessionData->links()}}

                </div>

            </div>
        </section>

    </div>
@endsection
