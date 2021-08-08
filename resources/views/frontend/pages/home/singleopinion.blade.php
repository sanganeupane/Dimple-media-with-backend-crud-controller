@extends('frontend/master/master')

@section('about')


    <div class="main-content">

        <section id="singleNews" class="page-padd">
            <div class="container">
                <div class="row">


                    <div class="col-md-8">
                        <h4>{{$opinionData->title}}</h4>

                        <img src="{{url('uploads/opinion/'.$opinionData->image)}}" class="img-fluid img-thumbnail" alt="{{$opinionData->name." 's Picture"}}">
<br>
                        <div class="single-news-list">
                            <p>
                                {{$opinionData->description}}
                            </p>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="recent-sidebar">
                            <div class="recent-sidebar-title">
                                Other Opinions
                            </div>
                            <div class="recent-sidebar-body">



                                    @foreach($otherOpinionData as $key=>$otherOpinions)
                                    <div class="recent-news-list">
                                        <div class="recent-news-title">
                                            <a href="{{route('singleopinion').'/'.$otherOpinions->id}}">
                                                {{$otherOpinions->title}}
                                            </a>
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
