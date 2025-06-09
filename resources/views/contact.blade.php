@extends('layouts.app')

@section('content')
<div class="container">
@if(count($banner)>0)
        @foreach($banner as $b)
            <img src="images/{{$b->image_name}}" alt="{{$b->alt}}" class="headerimage">
        @endforeach
        @endif

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card over-card">
                <div class="card-header greenheader">
                    <strong class="text-white">Contact</strong>
                    <div class="d-flex justify-content-end" style="margin-top: -20px;">
                        <button class="btn btn-primary btn-sm px-4 py-2 rounded-3 shadow-sm hover-button item" onclick="oneClickBooking()">
                            <strong>Book now</strong>
                        </button>
                    </div>
                </div>

                <div class="card-body whitecard">
                    @if(count($data)>0)
                    @foreach($data as $d)
                        {!! html_entity_decode($d->content) !!}
                    @endforeach
                    @endif

                    @include('inc.contactform')
                    @include('inc.socials')
                    @include('inc.contactmap')
                    
                    <!-- <div class="d-flex justify-content-center">
                        <img src="images/banner.jpg" alt="social handles banner image" class="mb-4 small_banner">
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>showActive(3);</script>
@endsection