@extends('frontend/master/master')

@section('about')


    <div class="main-content">

        <section id="singleNews" class="page-padd">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">

                        <h4>{{$confessionData->title}}</h4>
                        <div class="single-confession-address-date">
                            <div class="single-confession-age-gender">
                                Age {{ $confessionData->age}},
                                {{ucfirst( $confessionData->gender)}}
                                [{{ucfirst($confessionData->address)}}]
                            </div>
                            <div class="single-confession-date">
                                {{ $confessionData->created_at->format('d M Y')}}
                            </div>
                        </div>


                        <img src="{{url('uploads/confession/'.$confessionData->image)}}" class="img-fluid img-thumbnail" alt="{{$confessionData->name." 's Picture"}}" height="400px" width="500px">

                        <br>
                        <br>
                        <div class="single-news-list">
                            <p>
{{--                                {{$confessionData->description}}--}}
                                {!! $confessionData->description !!}
                            </p>
                        </div>
                        <h5 class="mt-5">
                            Leave a Comment
                        </h5>
                        <hr>
                    </div>
                    <div class="col-md-4">
                        <div class="recent-sidebar">
                            <div class="recent-sidebar-title">
                                Recent Confessions
                            </div>
                            <div class="recent-sidebar-body">
                                @foreach($recentConfessionData as $key=>$recentConfession)

                                    <div class="recent-news-list">
                                        <div class="recent-news-title">

                                            <a href="{{route('singleconfession').'/'.$recentConfession->id}}">
                                                {{$recentConfession->title}}
                                            </a>
                                        </div>
                                        <div class="recent-news-date">
                                            {{ $recentConfession->created_at->format('M d , Y')}}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
