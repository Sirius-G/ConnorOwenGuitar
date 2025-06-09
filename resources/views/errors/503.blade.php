@extends('layouts.app2')

@section('content')
<div class="container">
    <img src="images/logofull.png" style="position: absolute; left: 50%; top: 50px; margin-left: -150px; width: 300px;">
    <div class="card" style="position: relative; margin-top: 400px;">
        <div class="card-header greenheader">
            <strong class="text-white">{{ __('503 Error') }}</strong>

            </div>
            <div class="card-body bg-white">
                <h1>We'll be back soon!</h1>
                <br>
                <p>Sorry for the inconvenience. We're performing some maintenance right now.<br>Please check back later.</p>
            </div>  
        </div>
    <br><br><br>
</div>
@endsection
