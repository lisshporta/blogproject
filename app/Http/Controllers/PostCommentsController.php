<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    public function store(Post $post)
    {
        //validate
        request()->validate([
            'body' => 'required'
        ]);
        //preform an action
        $post->comments()->create([
            'user_id' => request()->user()->id,
            'body' => request('body')
        ]);
        //redirect
        return back();
    }
}
