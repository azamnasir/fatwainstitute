@extends('layouts.app')
@section('master')
    <body>
    <div style="background-image : linear-gradient(#04519b,#044687 60%,#033769); color : #fff !important;">
        <div class="container-fluid" style="padding: 50px;" >
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="multiple-image">
                        <img style="width:100% !important;" src="{{url('images/logo/Untitled.png')}}" >
                    </div>
                </div>
            </div>
        </div>
    </div>
        @yield('general')

</body>

@endsection
