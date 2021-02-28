@extends('layouts.app')

@section('page_title', 'Admin — Fauxtion')

@section('header_scripts')
    <link rel="stylesheet" href="{{ URL::asset('css/about.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/css/admin.css') }}">
@endsection

@section('content')

    <h1 class="title title-half">Admin panel</h1>
        <a class="create" href="/admin/create">Create new post</a>
    <div class="tableContainer">
        <table>
            <tr>
                <th>Title</th>
                <th>Price</th>
                <th>Highest bid</th>
                <th>Amounts of bids</th>
                <th>Edit</th>
                <th>State</th>
                <th>(Un)archive</th>
                <th>Delete</th>
            </tr>
            @foreach($posts as $post)
                <tr>
                    <td><a href="/items/{{$post->slug}}">{{ $post->title }}</a></td>
                    <td>{{ $post->price }}</td>
                    <td>{{ $post->highest_bid }}</td>
                    <td>{{ $post->bids()->count() }}</td>
                    <td><a class="edit" href="/admin/{{$post->slug}}/edit">Edit</a></td>
                    @if($post->archived == 0)
                        <td>Active</td>
                        <td><a class="archive" href="/admin/{{$post->slug}}/archive">Archive</a></td>
                    @else
                        <td>Archived</td>
                        <td><a class="unarchive" href="/admin/{{$post->slug}}/archive">Unarchive</a></td>
                    @endif
                    <td><a class="delete" href="/admin/{{$post->slug}}/delete">Delete</a></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
