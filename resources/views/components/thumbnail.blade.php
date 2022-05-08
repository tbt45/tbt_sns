@php
    if($type === 'users'){
        $path = 'storage/users/';
    }
    if($type === 'articles'){
        $path = 'storage/articles/';
    }

@endphp

{{-- <div>
    @if (empty($filename))
        <img src="{{ asset('images/no_image.jpg') }}">
    @else
        <img src="{{ asset($path . $filename) }}">
    @endif
</div> --}}
<div>
    @if (empty($filename))
        <img src="{{ asset('images/no_image.jpg') }}">
    @else
        <img src="{{ asset('storage/users/' . $filename) }}">
    @endif
</div>