@if(Auth::user())
    <div class="col-md-12">
        <form method="POST" action="/items/{item}" >
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
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary">Bid</button>
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
                <a href="/items/{{$post->slug}}/deleteBid/{{ $bid->id }}">Delete</a>
            @endif
        @endif
    @endforeach
</div>

