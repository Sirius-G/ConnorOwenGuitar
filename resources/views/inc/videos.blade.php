
<div class="flex justify-center bg-white p-4">
    <h2 class="header_title">Videos</h2>
    <div class="row">
        @foreach($videos as $v)
        <div class="col-sm-12 col-md-6">
            <div class="video-container">
                <iframe
                    src="{{ $v->video_index }}" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe>
            <br>
            </div>
            <p class="video_title">{{ $v->title }}</p>
        </div>
        @endforeach
    </div>
</div>