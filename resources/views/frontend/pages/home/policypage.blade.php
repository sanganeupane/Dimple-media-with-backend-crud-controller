@extends('frontend/master/master')

@section('about')


    <div class="main-content">

        <section id="policyPage" class="page-padd">
            <div class="container">
                <h4>Privacy Policy</h4>
                <hr>
                <div class="mt-3">
                    <p>
@foreach ($privacyData as $key=>$privacy)
{{$privacy->description}}


@endforeach


                    </p>
                </div>
            </div>
        </section>

    </div>


@endsection
