<?php


namespace App\Http\Controllers;

use App\Models\Bid;
use DB;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::where('archived', 0)->latest()->get();

        return view('welcome', ['posts' => $posts]);
    }

    public function adminIndex()
    {
        $posts = Post::latest()->get();

        return view('admin.index', ['posts' => $posts]);
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        $bids = Bid::where('post_id', $post->id)
            ->orderBy('id', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('post', [
            'post' => $post, 'bids' => $bids
        ]);
    }

    public function create()
    {
        Auth::user();
        return view('admin.create');
    }

    public function store(Request $request)
    {
        Auth::user();
        request()->validate([
            'title' => 'required',
            'slug' => 'required',
            'media' => 'required',
            'body' => 'required',
            'price' => 'required',
        ]);

        $post = new Post([
            'title' => request('title'),
            'slug' => request('slug'),
            'price' => request('price'),
            'body' => request('body'),
            'media' => request('media'),
        ]);

        if ($request->hasfile('media')) {
            foreach ($request->file('media') as $media) {
                $filename = $media->getClientOriginalName();

                $media->move(public_path('uploads'), $filename);
                $data[] = $filename;
            }
            $post->media = json_encode($data);
        }

        $post->save();

        return redirect('/items/' . request('slug'));
    }

    public function edit($slug)
    {
        Auth::user();
        $post = Post::where('slug', $slug)->firstOrFail();

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

    public function archive($slug) {
        Auth::user();
        $post = Post::where('slug', $slug)->firstOrFail();
        if($post->archived == 0) {
            $post->archived = 1;
            $post->update();
        } else {
            $post->archived = 0;
            $post->update();
        }
        return redirect('/admin')->with('info', 'Post archived!');
    }

    public function destroy($slug) {
        Auth::user();
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->delete();
        return redirect('/admin')->with('info', 'Post deleted!');
    }
}
