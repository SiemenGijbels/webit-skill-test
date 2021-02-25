@if(Auth::user())
    <div class="col-md-12">
        <form method="POST" action="/items/{{ $post->slug }}">
            @csrf
            <div class="form-group">
                <label for="content">Place your bid.</label>
                <input type="text" class="form-control" id="amount" name="amount">
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

<div class="bid">
    <h3>bids:</h3>
    @foreach($bids as $bid)
        @if($bid->post_id == $post->id)
            <p>{{ $bid->user->name }}</p>
            <p class="amount">€ {{ $bid->amount }},00</p>
            <hr class="ruler">
            @if(Auth::user()->id == $bid->user_id)
                <a href="/items/{{$post->slug}}/editBid/{{ $bid->id }}">Edit</a>
                <a href="/items/{{$post->slug}}/deleteBid/{{ $bid->id }}">Delete</a>
            @endif
        @endif
    @endforeach
</div>

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

