@extends('layouts.app')

@section('content')
    <h1>Edit bid:</h1>
    @if(Auth::user())
        <div class="col-md-12">
            <form method="POST" action="/items/{{ $post->slug }}/editBid/{{ $bid->id }}">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" id="amount" name="amount" value="{{ old('amount', $bid->amount) }}">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" id="id" name="id" value="{{ $bid->id }}">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" id="post_id" name="post_id" value="{{ $post->id }}">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" id="slug" name="slug" value="{{ $post->slug }}">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" id="user_id" name="user_id"
                           value="{{ Auth::user()->id }}">
                </div>
                <button id="bidSubmit" type="submit" class="btn btn-primary" disabled>Bid</button>
            </form>
        </div>
    @endif
@endsection

@section('footer_scripts')
    <script>
        $('#amount').keyup(function () {
            if ({{ $post->price }} > {{ $post->highest_bid }}) {
                if ($('#amount').val() > {{ $post->price }}) {
                    $("#bidSubmit").removeAttr("disabled");
                } else {
                    $("#bidSubmit").attr("disabled", "disabled");
                }
            } else {
                if ($('#amount').val() > {{ $post->highest_bid }}) {
                    $("#bidSubmit").removeAttr("disabled");
                } else {
                    $("#bidSubmit").attr("disabled", "disabled");
                }
            }
        });
    </script>
@endsection
