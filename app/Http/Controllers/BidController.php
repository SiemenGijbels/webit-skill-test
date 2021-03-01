<?php

namespace App\Http\Controllers;

use App\Mail\BidPlaced;
use App\Mail\OutBid;
use App\Models\Post;
use App\Models\Bid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BidController extends Controller
{

    public function store(Request $request)
    {
        $user = Auth::user();

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
            $bids = Post::where('slug', request('slug'))->firstOrFail()->bids()->orderBy('amount', 'desc')->get();
            foreach ($bids as $bid) {
                if(Auth::user()->id != $bid->user_id){

                    $outbidRecipient = $bid->user->email;

                    Mail::to($outbidRecipient)
                        ->send(new OutBid($bid->user->name, Auth::user()->name, $bid->amount, request('amount'), $post->title));

                    break;
                }
            }

        }
        $post->update();

        $bidderRecipient = $user->email;

        Mail::to($bidderRecipient)
        ->send(new BidPlaced($user->name, request('amount'), $post->title));

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
