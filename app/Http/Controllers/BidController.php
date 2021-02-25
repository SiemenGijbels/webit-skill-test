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

        return redirect('/thanks/' . request('slug') . '/' . request('amount'));
    }

    public function thanks($slug, $amount)
    {
        Auth::user();
        $bid = Bid::where('amount', $amount)->firstOrFail();
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('thankyou', ['post' => $post, 'bid' => $bid]);
    }


    public function edit($slug)
    {
        Auth::user();

        $post = Post::where('slug', $slug)->firstOrFail();
        $bids = Bid::where('post_id', $post->id)->get();


        return view('admin.edit', ['post' => $post]);
    }

    public function update(Request $request, $slug)
    {
        Auth::user();

        request()->validate([
            'title' => 'required',
            'slug' => 'required',
            'price' => 'required',
            'body' => 'required',
            'media' => 'required',
        ]);

        $post = Post::where('slug', $slug)->firstOrFail();

        $post->title = request('title');
        $post->slug = request('slug');
        $post->price = request('price');
        $post->body = request('body');
        $post->media = request('media');

        if ($request->hasfile('media')) {
            foreach ($request->file('media') as $media) {
                $filename = $media->getClientOriginalName();
                $media->move(public_path('uploads'), $filename);
                $data[] = $filename;
            }
            $post->media = json_encode($data);
        }

        $post->update();

        return redirect('/items/' . request('slug'));
    }

    public function destroy($slug, $bidId)
    {
        Auth::user();
        $post = Post::where('slug', $slug)->firstOrFail();
        $bid = Bid::find($bidId);
        $bid->delete();
        return redirect('/items/' . $post->slug);
    }


    public function postCommentPost(Request $request)
    {

        $comment = new Comment([
            'post_id' => $request->input('post_id'),
            'content' => $request->input('content'),
            'user_id' => $request->input('user_id')
        ]);
        $comment->save();

        return redirect()->route('content.post', ['id' => $request->input('post_id')]);
    }

    public function getDeleteComment($postId, $commentId)
    {

        $post = Post::find($postId);
        $comment = Comment::find($commentId);
        $comment->delete();
        return redirect()->route('content.post', ['id' => $postId]);
    }
}
