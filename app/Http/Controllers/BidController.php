<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Bid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BidController extends Controller
{

    public function store(Request $request)
    {
        Auth::user();
        $bid = new Bid([
            'post_id' => request('post_id'),
            'slug' => request('slug'),
            'amount' => request('amount'),
            'user_id' => request('user_id')
        ]);
        $bid->save();

        $post = Post::where('slug', request('slug'))->firstOrFail();
        $currentHighestBid = $post->highest_bid;
        if(request('amount') > $currentHighestBid) {
            $post->highest_bid = request('amount');
        }
        $post->update();

        return redirect('/thanks/' . request('slug') . '/' . request('amount'));
    }

    public function edit($slug, $bidId)
    {
        Auth::user();

        $post = Post::where('slug', $slug)->firstOrFail();
        $bid = Bid::find($bidId);


        return view('editbid', ['post' => $post, 'bid' => $bid]);
    }

    public function update(Request $request, $id, $bidId)
    {
        Auth::user();
        $bid = Bid::find($bidId);
        $bid->amount = request('amount');
        $bid->post_id = request('post_id');
        $bid->slug = request('slug');
        $bid->user_id = request('user_id');
        $bid->save();

        $post = Post::where('slug', $id)->firstOrFail();
        $currentHighestBid = $post->highest_bid;
        if(request('amount') > $currentHighestBid) {
            $post->highest_bid = request('amount');
        }
        $post->update();

        return redirect('/thanks/' . request('slug') . '/' . request('amount'));
    }

    public function destroy($slug, $bidId)
    {
        Auth::user();
        $post = Post::where('slug', $slug)->firstOrFail();
        $bid = Bid::find($bidId);
        $bid->delete();

        $highest = $post->bids()->orderBy('amount', 'desc')->firstOrFail();
        $highestBid = $highest->amount;

        if($highestBid) {
            $post->highest_bid = $highestBid;
            $post->update();
        } else {
            $post->highest_bid = 0;
            $post->update();
        }

        return redirect('/items/' . $post->slug);
    }

    public function thanks($slug, $amount)
    {
        Auth::user();
        $bid = Bid::where('amount', $amount)->firstOrFail();
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('thankyou', ['post' => $post, 'bid' => $bid]);
    }

}
