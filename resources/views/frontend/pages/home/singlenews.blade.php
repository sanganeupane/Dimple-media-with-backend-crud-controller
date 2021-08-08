@extends('frontend/master/master')

@section('about')


    <div class="main-content">

        <section id="singleNews" class="page-padd">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">


                        <h4>{{$newsData->title}}</h4>
                        <div class="text-right mb-2">
                            <em>- {{ $newsData->created_at->format('M d , Y')}}
                            </em>
                        </div>


                        <img src="{{url('uploads/news/'.$newsData->image)}}" class="img-fluid img-thumbnail"
                             alt="{{$newsData->name." 's Picture"}}" height="400px" width="600px">

                        <br>
                        <br>
                        <div class="single-news-list">
                            <p>
                                {{$newsData->description}}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="recent-sidebar">
                            <div class="recent-sidebar-title">
                                Recent News
                            </div>
                            <div class="recent-sidebar-body">

                                @foreach($recentNewsData as $key=>$recents)
                                    <div class="recent-news-list">
                                        <div class="recent-news-title">
                                            <a href="{{route('singlenews').'/'.$recents->id}}">
                                                {{$recents->title}}
                                            </a>
                                        </div>
                                        <div class="recent-news-date">
                                            {{ $recents->created_at->format('M d , Y')}}
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
