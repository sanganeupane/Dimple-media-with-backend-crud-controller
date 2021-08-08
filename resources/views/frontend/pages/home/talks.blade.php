@extends('frontend/master/master')

@section('about')


    <div class="main-content">

        <section id="pageBanner" style="background-image: url(frontend/img/homebg.jpg);">
            <div class="container">
                <div class="page-title">
                    Talks
                </div>
            </div>
        </section>

        <section id="talksList" class="page-padd">
            <div class="container">
                <div class="row">
                    @foreach($talksData as $key=>$talks)


                        <div class="col-md-4">
                            <div class="talk-block">
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
                                        {{ substr($talks->description,0,200)}}

                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach


                </div>
                <div class="text-center my-3">
                    {{$talksData->links()}}
                </div>
            </div>
        </section>

    </div>
@endsection
