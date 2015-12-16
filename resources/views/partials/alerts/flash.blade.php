@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

@foreach (['error', 'success', 'info'] as $msg)
    @if(Session::has($msg))
        <div id="flashholder">
            <div class="flash flash-notice is-visible">
                <i class="flash_icon flash-{{ $msg }}"></i>
                <div class="flash_content"><p>{{ Session::get($msg) }}</p></div>
                {{--<p class="alert{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>--}}
            </div>
        </div> <!-- end .flash-message -->
    @endif
@endforeach