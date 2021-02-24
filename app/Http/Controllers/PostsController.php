<?php


namespace App\Http\Controllers;

use DB;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
{
    public function index() {
        $posts = Post::latest()->get();

        return view('welcome', ['posts' => $posts]);
    }

    public function adminIndex() {
        $posts = Post::latest()->get();

        return view('admin.index', ['posts' => $posts]);
    }

    public function show($slug) {
        return view('post', [
            'post' => Post::where('slug', $slug)->firstOrFail()
        ]);
    }

    public function create(){
        Auth::user();
        return view('admin.create');
    }

    public function store(Request $request) {
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

        if($request->hasfile('media'))
        {
            foreach($request->file('media') as $media)
            {
                $filename = $media->getClientOriginalName();

                $media->move(public_path('uploads'), $filename);
                $data[] = $filename;
            }
            $post->media = json_encode($data);
        }

        $post->save();

        return redirect('/item/' . request('slug'));
    }

    public function edit() {

    }

    public function update() {

    }

    public function destroy() {

    }
}
