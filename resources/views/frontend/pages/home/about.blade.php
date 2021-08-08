@extends('frontend/master/master')

@section('about')

    <div class="main-content">

        <section id="pageBanner" style="background-image: url(frontend/img/homebg.jpg);">
            <div class="container">
                <div class="page-title">
                    About
                </div>
            </div>
        </section>

        <section id="about" class="page-padd">
            <div class="container">
                <div class="row">
                        <div class="col-md-6">
                            <div class="video-wrapper">
                                <a href="https://www.youtube.com/watch?v=YlHxe_whZeU&t=248s" class="html5lightbox">

                                    @foreach ($aboutData as $key=>$about )

                                    <img src="{{url('uploads/about/'.$about->image)}}" width="100%" height="100%"
                                         alt="">

                                         @endforeach

                                    <div class="video-play-btn">
                                        <i class="fa fa-play"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="abt-title">
                                Dimple Media
                            </div>
                            <div class="abt-text">
                                @foreach ($aboutData as $key=>$about )
                                {{$about->description}}

                                @endforeach
                            </div>
                        </div>
                </div>
            </div>
        </section>

        <section id="team" class="page-padd">
            <div class="container">
                <div class="section-header3">
                    Our Team
                </div>
                <div class="text-center">
                    <span class="title-bar"></span>
                </div>
                <div class="row">
                    @foreach($ourteamData as $key=>$ourteam)

                        <div class="col-sm-6 col-md-3">
                            <div class="team-card">
                                <div class="team-img">
                                    <img src="{{url('uploads/ourteam/'.$ourteam->image)}}" width="20%" height="20%"
                                         alt="">
                                </div>

                                <div class="team-profile">
                                    <div class="team-name">
                                        {{$ourteam->name}}
                                    </div>
                                    <div class="team-post">
                                        {{$ourteam->post}}

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="contact" class="page-padd">
            <div class="container">
                <div class="section-header3">
                    Contact Us
                </div>
                <div class="text-center">
                    <span class="title-bar"></span>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="contact-icon-block">
                            <div class="contact-icon">
                                <i class="fa fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-icon-txt">
@foreach ($contactData as $key=>$contact)
{{$contact->address}},
{{$contact->city}},
{{$contact->country}}

@endforeach

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-icon-block">
                            <div class="contact-icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="contact-icon-txt">

                                @foreach ($contactData as $key=>$contact)

                                {{$contact->email}}

                                @endforeach                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-icon-block">
                            <div class="contact-icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="contact-icon-txt">

                                @foreach ($contactData as $key=>$contact)

                                {{$contact->phone}}

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="advertise">
            <div class="container">
                <div class="text-center">
                    For Advertisement, Please Call Us at +977 9812345678
                </div>
            </div>
        </section>

    </div>


@endsection
