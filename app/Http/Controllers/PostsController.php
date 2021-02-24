<?php


namespace App\Http\Controllers;

use DB;
use App\Models\Post;


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

    }

    public function store() {

    }

    public function edit() {

    }

    public function update() {

    }

    public function destroy() {

    }
}
