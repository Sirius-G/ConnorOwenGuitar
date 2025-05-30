@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="toast show message_bar" role="alert" aria-live="assertive" aria-atomic="true" style="position: absolute; top: 175px; right: 10px;">
            <div class="toast-header bg-danger text-white">
                <strong class="me-auto">Alert</strong>
                <small><?php $t = now(); echo $t->diffForHumans(); ?></small>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button> -->
            </div>
            <div class="toast-body bg-white text-black" style="color: #000;">
                {{session('error')}}
            </div>
        </div>
    @endforeach
@endif

@if(session('success'))
<div class="toast show message_bar" role="alert" aria-live="assertive" aria-atomic="true" style="position: absolute; top: 175px; right: 10px;">
    <div class="toast-header bg-success text-white">
        <strong class="me-auto">Success</strong>
        <small><?php $t = now(); echo $t->diffForHumans(); ?></small>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button> -->
    </div>
    <div class="toast-body bg-white text-black">
        {{session('success')}}
    </div>
</div>
@endif

@if(session('error'))
<div class="toast show message_bar" role="alert" aria-live="assertive" aria-atomic="true" style="position: absolute; top: 175px; right: 0px; z-index: 1000;">
    <div class="toast-header bg-danger text-white">
        <strong class="me-auto">Alert</strong>
        <small><?php $t = now(); echo $t->diffForHumans(); ?></small>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button> -->
    </div>
    <div class="toast-body bg-white text-black">
        {{session('error')}}
    </div>
</div>
@endif

@if(session('info'))
<div class="toast show message_bar" role="alert" aria-live="assertive" aria-atomic="true" style="position: absolute; top: 175px; right: 0px; z-index: 1000;">
    <div class="toast-header bg-info text-white">
        <strong class="me-auto">Info</strong>
        <small><?php $t = now(); echo $t->diffForHumans(); ?></small>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button> -->
    </div>
    <div class="toast-body bg-white text-black">
        {{session('info')}}
    </div>
</div>
@endif

@if(session('warning'))
<div class="toast show message_bar" role="alert" aria-live="assertive" aria-atomic="true" style="position: absolute; top: 175px; right: 0px; z-index: 1000;">
    <div class="toast-header bg-warning text-white">
        <strong class="me-auto">Info</strong>
        <small><?php $t = now(); echo $t->diffForHumans(); ?></small>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button> -->
    </div>
    <div class="toast-body bg-white text-black">
        {{session('warning')}}
    </div>
</div>
@endif

@if(session('csrf'))
    <div class="text-xs text-black">
        {{session('csrf')}}
    </div>
@endif