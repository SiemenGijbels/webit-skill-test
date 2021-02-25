@extends('layouts.app')

@section('header_scripts')
    <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
@endsection

@section('content')
    <div class="posts">
        @foreach($posts as $post)
            <a href="/items/{{$post->slug}}">
                <div class="post-item">
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
                    <div class="post-item-info">
                        <h2 class="float-left">{{ $post->title }}</h2>
                        <h2 class="float-right price">€{{ $post->price }},00</h2>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection

@section('footer_scripts')
    <script>
        // init Masonry
        var $grid = $('.posts').masonry({
            itemSelector: '.post-item'
        });
        // layout Masonry after each image loads
        $grid.imagesLoaded().progress( function() {
            $grid.masonry('layout');
        });
    </script>
@endsection
