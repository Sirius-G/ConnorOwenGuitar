@extends('layouts.app')

@section('content')
<div class="container">
<br><br><br><br><br><br>
    <div class="card over-card">
        <div class="card-header greenheader">
            <strong class="text-white">{{ __('503 Error') }}</strong>

            </div>
            <div class="card-body">
                <h1>We'll be back soon!</h1>
                <br>
                <p>Sorry for the inconvenience. We're performing some maintenance right now.<br>Please check back later.</p>
            </div>  
        </div>
    <br><br><br>
</div>
@endsection
