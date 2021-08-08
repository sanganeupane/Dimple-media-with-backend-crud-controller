@extends('frontend/master/master')

@section('about')




    <div class="main-content">

        <section id="pageBanner" style="background-image: url(frontend/img/homebg.jpg);">
            <div class="container">
                <div class="page-title">
                    News
                </div>
            </div>
        </section>

        <section id="newsList" class="page-padd">
            <div class="container">
                <div class="row">
                    @foreach($newsData as $key=>$news)
                        <div class="col-md-4">



                            <div class="talk-block">
                                <div class="video-wrapper">
                                    <img src="{{url('uploads/news/'.$news->image)}}" height="300px" width="300px" )>
                                </div>
                            </div>

                            <div class="news-block">


                                <div class="news-block-heading">
                                    <td>{{$news->title}}</td>
                                </div>
                                <div class="news-block-excerpt">
{{--                                    <td>{{$news->description}}</td>--}}
                                    <td>{{substr($news->description,0,500)}}</td>

                                </div>
                                <hr>

                                <div class="news-block-date">
                                    18th March, 2021
                                </div>
                                <hr>
                                <a class="news-block-btn" href="{{route('singlenews').'/'.$news->id}}">Read More >></a>
                            </div>
                        </div>
                    @endforeach
                </div>
                    <div class="text-center my-3">
                        {{$newsData->links()}}
                    </div>
                </div>


        </section>

    </div>
@endsection
