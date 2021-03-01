@extends('layouts.app')

@section('page_title', 'Thank you!')

@section('content')
    <div class="container">
        <h1>Thank you!</h1>
        <h2>We've received your bid of €{{ $bid->amount }},00 on {{ $post->title }}.</h2>
        <p>You will receive a confirmation email with the details.</p>
        <p><a href="/">➝ Go back to homepage.</a></p>
        <p><a href="/items/{{ $post->slug }}">➝ Go back to {{ $post->title }}.</a></p>
    </div>
@endsection
