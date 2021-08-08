@section('footer')

    <footer>
        <div class="pre-footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 footer-2nd">
                        <div class="footer-title">
                            Quick Links
                        </div>
                        <div class="footer-desc">
                            <ul style="padding: 0; list-style: none; margin-bottom: 0;">
                                <li><a href="{{route('about')}}">For Advertisement</a></li>
                                <li><a href="{{route('policypage')}}">Privacy Policy</a></li>
                                <li><a href="{{route('termspage')}}">Terms and Conditions</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 footer-4th">
                        <div class="footer-title">
                            Contact Details
                        </div>
                        <div class="footer-list">
@foreach ($contactData as $key=>$contact )

{{$contact->address}},
{{$contact->city}},
{{$contact->country}}

@endforeach


                            <i class="fa fa-map-marker-alt"></i>
                        </div>
                        <div class="footer-list">

                            @foreach ($contactData as $key=>$contact )

                            {{$contact->phone}}

                            @endforeach
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="footer-list">



                            @foreach ($contactData as $key=>$contact )

                            {{$contact->email}}

                            @endforeach
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="footer-social">
                            <a href="https://www.facebook.com/" target="_blank">
                                <img src="{{url('frontend/img/facebook.png')}}">
                            </a>
                            <a href="https://twitter.com/" target="_blank">
                                <img src="{{url('frontend/img/twitter.png')}}">
                            </a>
                            <a href="https://www.instagram.com/" target="_blank">
                                <img src="{{url('frontend/img/instagram.png')}}">
                            </a>
                            <a href="https://www.youtube.com/" target="_blank">
                                <img src="{{url('frontend/img/youtube.png')}}">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="cp">
                    <div>
                        © 2021 Dimple Media. All Rights Reserved
                    </div>
                    <div>
                        Developed by <a href="#">IT Arrow Pvt Ltd.</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <a id="back-to-top" href="#" class="btn back-to-top" role="button"><i class="fa fa-chevron-up"></i></a>

    <script type="text/javascript" src="{{url('frontend/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{url('frontend/html5lightbox/html5lightbox.js')}}'"></script>
    <script type="text/javascript" src="{{url('frontend/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{url('frontend/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{url('frontend/js/wow.min.js')}}"></script>
    <script type="text/javascript" src="{{url('frontend/js/custom.js')}}"></script>

    </div>

    </body>
    </html>
@endsection
