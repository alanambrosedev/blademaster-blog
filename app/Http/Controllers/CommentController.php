<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request, Post $post)
    {
        $post->comments()->create($request->validated());

        return back()->with('status', 'Comment submitted — awaiting approval.');
    }
}
