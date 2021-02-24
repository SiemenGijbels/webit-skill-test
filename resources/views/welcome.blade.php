@extends('layouts.app')

@section('content')
    @foreach($posts as $post)
        <a href="/items/{{$post->slug}}">
            <div class="workItem">
                <h2>{{ $post->title }}</h2>
                @if(is_array(json_decode($post->media)))
                    @foreach(json_decode($post->media) as $file)
                        @if(ends_with($file, 'jpg') || ends_with($file, 'jpeg') || ends_with($file, 'png'))
                            <img class="homepage-grid " src="{{ asset('uploads/') }}/{{ $file }}">
                        @endif
                    @endforeach
                    @foreach(json_decode($post->media) as $file)
                        @if(ends_with($file, 'mp4') || ends_with($file, 'm4a') || ends_with($file, 'mov'))
                            <video class="homepage-grid grid-pic" autoplay muted loop controls src="{{ asset('uploads/') }}/{{ $file }}"></video>
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
                <h2 class="floatRight">{{ $post->price }}</h2>
            </div>
        </a>
    @endforeach
@endsection
