@extends('layouts.app')

@section('content')
<div class="container">
    <div class="header">
        @if(count($banner)>0)
        @foreach($banner as $b)
            <img src="images/{{$b->image_name}}" alt="{{$b->alt}}" class="headerimage">
        @endforeach
        @endif
        <a href="#TOP" title="Want to learn guitar?" aria-label="Want to learn guitar?" class="btn btn-primary btn-sm px-4 py-2 rounded-3 shadow-sm hover-button item overbanner">
            <strong>Want to learn guitar?<br>Click here to read more!</strong>
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card over-card" id="TOP">
                <div class="card-header greenheader">
                    <strong class="text-white">Home</strong>
                    <div class="d-flex justify-content-end" style="margin-top: -20px;">
                        <a href="/tuition" title="Tuition at Connor Owen Guitar" aria-label="Tuition at Connor Owen Guitar" class="btn btn-primary btn-sm px-4 py-2 rounded-3 shadow-sm hover-button item">
                                <strong>Want to learn guitar? &nbsp; Find out more</strong>
                        </a>
                    </div>
                </div>

                <div class="card-body whitecard">
                    @if(count($data)>0)
                    @foreach($data as $d)
                        {!! html_entity_decode($d->content) !!}
                    @endforeach
                    @endif
                    
                    <!-- <div class="d-flex justify-content-center">
                        <img src="images/banner.jpg" alt="social handles banner image" class="mb-4 small_banner">
                    </div> -->

                    @include('inc.videos')

                </div>
            </div>
        </div>
    </div>
</div>

<script>showActive(1);</script>
@endsection