@if(Auth::user())
    <form method="POST" class="bid-form" action="/items/{{ $post->slug }}">
        @csrf
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
        <div class="form-group">
            <label class="bid-form-label" for="amount">Place your bid.</label>
            <input type="text" class="form-control bid-form-amount" id="amount" name="amount" @if($post->highest_bid > 0) placeholder="Enter a bid that's higher than the current highest bid" @else placeholder="Enter a bid that's higher than the asking price" @endif>
        </div>
        <button id="bidSubmit" type="submit" class="btn btn-primary bid-form-button" disabled>Bid</button>
    </form>
@endif

<div class="bids">
    <h3>Bids:</h3>
    <div class="bids-placed">
        @foreach($bids as $bid)
            @if($bid->post_id == $post->id)
                <p><a href="/user/{{ $bid->user->id }}">{{ $bid->user->name }}</a></p>
                <p class="amount">€ {{ $bid->amount }},00</p>
                @if(Auth::user()->id == $bid->user_id)
                    <div class="controls">
                        <a href="/items/{{$post->slug}}/editBid/{{ $bid->id }}">Edit</a>
                        <a href="/items/{{$post->slug}}/deleteBid/{{ $bid->id }}">Delete</a>
                    </div>
                @endif
                <hr class="ruler">
            @endif
        @endforeach
    </div>
</div>

@section('footer_scripts')
    <script>
        $('#amount').keyup(function () {
            if ({{ $post->price }} > {{ $post->highest_bid }})
            {
                if ($('#amount').val() > {{ $post->price }}) {
                    $("#bidSubmit").removeAttr("disabled");
                } else {
                    $("#bidSubmit").attr("disabled", "disabled");
                }
            }
        else
            {
                if ($('#amount').val() > {{ $post->highest_bid }}) {
                    $("#bidSubmit").removeAttr("disabled");
                } else {
                    $("#bidSubmit").attr("disabled", "disabled");
                }
            }
        });
    </script>
@endsection

