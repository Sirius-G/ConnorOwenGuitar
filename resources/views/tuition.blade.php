@extends('layouts.app')

@section('content')
<div class="container">
    <div class="header">
        <img src="images/Banner_tuition.avif" alt="Connor Owen Guitar Banner image" class="headerimage">
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card over-card">
                <div class="card-header greenheader">
                    <strong class="text-white">Tuition</strong>
                    <div class="d-flex justify-content-end" style="margin-top: -20px;">
                        <a href="/contact" title="Get in touch with Connor" aria-label="Get in touch with Connor" class="btn btn-primary btn-sm px-4 py-2 rounded-3 shadow-sm hover-button item">
                            <strong>Get in touch or book lessons now</strong>
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
                </div>
            </div>
        </div>
    </div>
</div>

<script>showActive(2);</script>
@endsection