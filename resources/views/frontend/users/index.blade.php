
    @extends('frontend.master.master')
    @section('login')
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3>Hello {{Auth::guard('web')->user()->username}}</h3>
                    @include('backend.layouts.message')

                    <hr>

                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium alias aliquid animi blanditiis, consequ
                        fhgkvbjklnl;dmfbxfbjjhgdhlsoigweweu fgjeoirjfklblknsds vosijgoigjs v s,mnvsoignslsdng  n slkskghsatur co
                        rporis deleniti dolor dolorum exercitationem, expedita fugit, hic nam non numquam saepe similique sit vel.
                    </p>


                    <div class="form-group">
                        <button class="btn btn-success"> <a href="{{route('logout')}}"  style="color: #1b1e21">Logout</a></button>
                    </div>

                </div>
            </div>
        </div>

    @endsection
