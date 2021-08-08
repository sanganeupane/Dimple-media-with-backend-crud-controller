@extends('frontend/master/master')
@section('home')
    <div id="app">


        <div class="main-content">

            <section id="longImage">
                <div class="container">
                    <img src="{{url('frontend/img/longimage.gif')}}">
                </div>
            </section>

            <section id="confessionSection">
                <div class="container">
                    <div class="section-header1 wow animated zoomIn delay-0.5s ease">
                        Confession
                    </div>
                    <br>


                    {{--                    @foreach($confessionData as $key=>$confessions)--}}
                    {{--                        <ul class="home-confession-list wow animated zoomIn delay-1s ease">--}}

                    {{--                            <li><a href="{{route('singleconfession').'/'.$confessions->id}}">{{$confessions->title}}--}}
                    {{--                                </a>--}}
                    {{--                            </li>--}}

                    {{--                            @endforeach--}}
                    {{--                        </ul>--}}


                    <div class="row">
                        @foreach($confessionData as $key=>$confessions)

                            <div class="col-md-4">
                                <ul class="talk-block wow animated zoomIn delay-1s ease">

                                    <div class="video-wrapper">
                                        <img src="{{url('uploads/confession/'.$confessions->image)}}">

                                    </div>

                                    <div class="talk-block-txt">
                                        <div class="talk-block-title">
                                            {{--                                            {{$opinions->title}}--}}
                                            <li>
                                                <a href="{{route('singleconfession').'/'.$confessions->id}}" style="color:white">{{$confessions->title}}

                                                </a>
                                            </li>
                                        </div>
                                        <div class="talk-block-excerpt">

                                            {{ substr($confessions->description,0,140)}}

                                        </div>
                                    </div>

                                </ul>
                            </div>
                        @endforeach
                    </div>


                    <div class="text-center">
                        <a href="{{route('confession')}}" class="border-btn">Show More</a>
                    </div>
                </div>
            </section>

            <section id="opinionSection" style="background-image: url('frontend/img/homebg.jpg');">
                <div class="container">
                    <div class="section-header2 wow animated slideInRight delay-0.5s ease">
                        Opinion
                    </div>

                    {{--                                        @foreach($opinionData as $key=>$opinions)--}}

                    {{--                                            <ul class="opinion-list wow animated slideInLeft delay-0.5s ease">--}}
                    {{--                                                <li><a href="{{route('singleopinion').'/'.$opinions->id}}">{{$opinions->title}}</a></li>--}}
                    {{--                                            </ul>--}}
                    {{--                                        @endforeach--}}

                    <div class="row">
                        @foreach($opinionData as $key=>$opinions)

                            <div class="col-md-4">
                                {{--                                <div class="talk-block wow animated slideInLeft delay-0.5s ease">--}}
                                <ul class="talk-block wow animated slideInLeft delay-0.5s ease">

                                    <div class="video-wrapper">

                                        <img src="{{url('uploads/opinion/'.$opinions->image)}}">

                                        </a>
                                    </div>
                                    <div class="talk-block-txt">
                                        <div class="talk-block-title">
                                            {{--                                            {{$opinions->title}}--}}
                                            <li>
                                                <a href="{{route('singleopinion').'/'.$opinions->id}}"  style="color:white">{{$opinions->title}}</a>
                                            </li>
                                        </div>
                                        <div class="talk-block-excerpt">
                                            {{ substr($opinions->description,0,150)}}

                                        </div>
                                    </div>

                                </ul>
                            </div>
                        @endforeach
                    </div>


                    <div class="text-center">
                        <a href="{{route('opinion')}}" class="border-btn">Show More</a>
                    </div>


                </div>
            </section>

            <section id="talksSection">
                <div class="container">
                    <div class="section-header3 wow animated slideInDown delay-0.5s ease">
                        Talks
                    </div>
                    <div class="text-center">
                        <span class="title-bar"></span>
                    </div>
                    <div class="row">
                        @foreach($talksData as $key=>$talks)

                            <div class="col-md-4">
                                <div class="talk-block wow animated slideInLeft delay-0.5s ease">
                                    <div class="video-wrapper">
                                        <a href="https://www.youtube.com/watch?v=NZ5o9PcHeL0" class="html5lightbox">
                                            <img src="{{url('uploads/talks/'.$talks->image)}}">
                                            <div class="video-play-btn">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="talk-block-txt">
                                        <div class="talk-block-title">
                                            {{$talks->title}}
                                        </div>
                                        <div class="talk-block-excerpt">
                                            {{ substr($talks->description,0,80)}}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center">
                        <a href="{{route('talks')}}" class="border-btn">More Talks</a>
                    </div>
                </div>
            </section>

            <section id="newsSection">
                <div class="container">
                    <div class="section-header3 wow animated zoomIn delay-0.5s ease">
                        News
                    </div>
                    <div class="text-center">
                        <span class="title-bar"></span>
                    </div>

                    {{--                <div class="row">--}}

                    {{--                    <div class="col-sm-11 mx-auto">--}}
                    {{--                        <ul class="news-list  wow animated zoomIn delay-1s ease">--}}

                    {{--                            @foreach($newsData as $key=>$news)--}}
                    {{--                                <li>--}}
                    {{--                                    <a href="{{route('singlenews').'/'.$news->id}}">--}}
                    {{--                                        <div class="news-list-title">--}}
                    {{--                                            {{$news->title}}--}}

                    {{--                                        </div>--}}
                    {{--                                        <div class="news-list-date">--}}
                    {{--                                            {{ $news->created_at->format('M d , Y')}}--}}
                    {{--                                        </div>--}}
                    {{--                                    </a>--}}
                    {{--                                </li>--}}
                    {{--                            @endforeach--}}

                    {{--                        </ul>--}}
                    {{--                    </div>--}}
                    {{--                </div>--}}


                    <div class="row">


                        {{--                        <div class="col-sm-11 mx-auto">--}}
                        {{--                            <ul class="news-list  wow animated zoomIn delay-1s ease">--}}

                        @foreach($newsData as $key=>$news)

                            <div class="col-md-4">
                                <div class="talk-block wow animated zoomIn delay-1s ease">
                                    {{--                                    <ul class="talk-block wow animated slideInLeft delay-0.5s ease">--}}

                                    <div class="video-wrapper">

                                        <img src="{{url('uploads/news/'.$news->image)}}">

                                        </a>
                                    </div>
                                    <div class="news-list-date">
                                        {{ $news->created_at->format('M d , Y')}}
                                    </div>
                                    <div class="talk-block-txt">
                                        <div class="talk-block-title">
                                            {{--                                            {{$opinions->title}}--}}
                                            <li>
                                                <a href="{{route('singlenews').'/'.$news->id}}"  style="color:white">{{$news->title}}</a>

                                            </li>
                                        </div>
                                        <div class="talk-block-excerpt">
                                            {{ substr($news->description,0,150)}}

                                        </div>
                                    </div>

                                    </ul>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>

                <div class="text-center">
                    <a href="{{route('news')}}" class="border-btn">See More News</a>
                </div>
            </section>

        </div>


@endsection

