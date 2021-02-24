@extends('layouts.app')

@section('page_title', 'Admin — Siemen Gijbels')

@section('header_scripts')
    <link rel="stylesheet" href="{{ URL::asset('css/about.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/css/admin.css') }}">
@endsection

@section('content')

    <h1>Admin</h1>
    <div class="container">
        <a href="/admin/create">Create new post</a>
        <table>
            <tr>
                <th>Title</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($posts as $post)
                <tr>
                    <td><a href="/items/{{$post->slug}}">{{ $post->title }}</a></td>
                    <td><a href="/admin/{{$post->slug}}/edit">Edit</a></td>
                    <td><a href="/admin/{{$post->slug}}/delete">Delete</a></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
