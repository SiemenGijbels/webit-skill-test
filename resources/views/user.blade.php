@extends('layouts.app')

@section('page_title', $user->name)

@section('content')
    <div class="info-wrapper">
        <div class="user-form-wrapper">
            <div class="user-wrapper">
                @if(isset($user->avatar))
                    <img class="avatar" src="{{ asset('uploads/avatars') }}/{{ $user->avatar  }}">
                @else
                    <img class="avatar" src="{{ asset('uploads/avatars/unset-avatar.jpg') }}">
                @endif
                <h3 class="user-name">{{ $user->name }}</h3>
            </div>

            <div class="form-wrapper">
                @if($user->id == Auth::user()->id)
                    <form method="POST" action="/user/{{ $user->id }}" enctype="multipart/form-data">
                        @csrf
                        <div class="field">
                            @if(isset($user->avatar))
                                <label class="label" for="avatar">Change your profile picture</label>
                            @else
                                <label class="label" for="avatar">Choose your profile picture</label>
                            @endif
                            <div class="input-group control-group increment">
                                <input type="file" name="avatar">
                            </div>
                        </div>

                        <div class="field is-grouped">
                            <div class="control">
                                <button class="button is-link" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
        <div class="bids bids-user">
            <h3>Bids:</h3>
            @foreach($bids as $bid)
                @if($bid->user_id == $user->id)
                    <a href="/items/{{ $bid->slug }}">
                        <div>
                            <p>{{ $bid->post->title }}</p>
                            <p class="amount">€ {{ $bid->amount }},00</p>
                            <hr class="ruler">
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
    </div>
@endsection
