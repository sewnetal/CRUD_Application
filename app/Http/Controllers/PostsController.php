<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Posts;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules\In;

class PostsController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth')->except('index', 'show');
    }
    public function index(){

        $posts = Posts::latest()->filter(\request(['month', 'year']))->get();



        return view('posts.index', compact('posts', 'archives'));
    }

    public function show(Posts $posts){


        return view('posts.show', compact('posts'));
    }

    public function create(){

        return view('posts.create');
    }

    public function store(){

        $this->validate(request(),[
            'title' => 'required',
            'body' => 'required|min:2',

            ]);

        auth()->user()->publish(

            new Posts(\request(['title', 'body']))
        );

       return redirect('/');
    }
    public function edit(Posts $posts)
    {
        return view('posts.edit', compact('posts'));

    }
    public function update(Posts $posts)
    {
        $this->validate(request(),[
            'title' => 'required',
            'body' => 'required|min:2',

        ]);
        $posts = Posts::find($posts)->first();
        $posts->title = Input::get('title');
        $posts->body  = Input::get('body');
        $posts->save();


        return redirect('/')->with('success', 'Post updated');

    }

    public function destroy(Posts $posts)
    {
        $posts = Posts::find($posts)->first();
        $posts->delete();


        return redirect('/');

    }
}
