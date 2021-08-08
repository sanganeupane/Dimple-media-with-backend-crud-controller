@extends('frontend/master/master')

@section('about')


    <div class="main-content">

        <section id="pageBanner" style="background-image: url(frontend/img/homebg.jpg);">
            <div class="container">
                <div class="page-title">
                    Opinion
                </div>
            </div>
        </section>

        <section id="opinionList" class="page-padd">
            <div class="container">
                <div class="opinion-list">
                    <div class="row">
                        @foreach($opinionData as $key=>$opinions)
                            <div class="col-md-6">


                                <div class="talk-block">
                                    <div class="video-wrapper">


                                        <img src="{{url('uploads/opinion/'.$opinions->image)}}">


                                    </div>

                                    <div class="opinion-block">

                                        <div class="opinion-block-title">
                                            <td>{{$opinions->title}}</td>
                                        </div>
                                        <hr>
                                        <div class="opinion-block-desc">
                                            {{--                                        <td>{{$opinions->description}}</td>--}}
                                            <td>{{substr($opinions->description,0,500)}}</td>


                                        </div>
                                        <a href="{{route('singleopinion').'/'.$opinions->id}}"
                                           class="confession-block-btn ">Read More</a>
                                        {{--                                    <a href="{{route('post').'/'.$data->id}}" class="catg_title"><h1>{{$data->title}}</h1></a>--}}

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="text-center my-3">
                    {{--                    Pagination Here--}}
                    {{$opinionData->links()}}

                </div>

            </div>
        </section>

    </div>
@endsection
