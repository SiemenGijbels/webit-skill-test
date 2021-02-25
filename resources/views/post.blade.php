@extends('layouts.app')

@section('content')
    <div class="media-wrapper">
        @if(is_array(json_decode($post->media)))
            @foreach(json_decode($post->media) as $file)
                @if(ends_with($file, 'jpg') || ends_with($file, 'jpeg') || ends_with($file, 'png'))
                    <img class="homepage-grid " src="{{ asset('uploads/') }}/{{ $file }}">
                @endif
            @endforeach
            @foreach(json_decode($post->media) as $file)
                @if(ends_with($file, 'mp4') || ends_with($file, 'm4a') || ends_with($file, 'mov'))
                    <video class="homepage-grid grid-pic" autoplay muted loop controls
                           src="{{ asset('uploads/') }}/{{ $file }}"></video>
                @endif
            @endforeach
        @else
            @if(ends_with($post->media, 'jpg') || ends_with($post->media, 'jpeg') || ends_with($post->media, 'png'))
                <img class="homepage-grid " src="{{ asset('uploads/') }}/{{ $post->media }}">
            @endif
            @if(ends_with($post->media, 'mp4') || ends_with($post->media, 'm4a') || ends_with($post->media, 'mov'))
                <video class="homepage-grid grid-pic" autoplay muted loop controls
                       src="{{ asset('uploads/') }}/{{ $post->media }}"></video>
            @endif
        @endif
    </div>

    <div class="info-wrapper">
        <h1>{{ $post->title }}</h1>
        <h3 class="price">starting price: €{{ $post->price }},00</h3>
        @if($post->highest_bid > 0)
            <h3 class="price">highest current bid: €{{ $post->highest_bid }},00</h3>
        @endif

        <p>{{ $post->body }}</p>

        <hr>

        @include('partials/bids')
    </div>
@endsection
