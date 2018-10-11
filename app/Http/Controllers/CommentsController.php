<?php

namespace App\Http\Controllers;

use App\Posts;
use App\Comment;


use Illuminate\Http\Request;

class CommentsController extends Controller
{

    public function store(Posts $posts)

    {

        $this->validate(request(), [

            'body' => 'required|min:2',


        ]);

        $posts->addComment(\request('body'),auth()->id());


        return back();

    }

}
