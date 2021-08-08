@extends('frontend/master/master')

@section('about')


    <div class="main-content">

        <section id="termsPage" class="page-padd">
            <div class="container">
                <h4>Terms & Conditions</h4>
                <hr>
                <div class="mt-3">
                    <p>
                        @foreach ($termsData as $key=>$terms )
                        {{$terms->description}}

                        @endforeach


                        </p>
                </div>
            </div>
        </section>

    </div>
@endsection
