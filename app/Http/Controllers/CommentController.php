<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Post;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param CommentRequest $request
     * @param integer $postId 
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request, $postId)
    {
        Post::findOrFail($postId)->comments()->create($request->all());

        return redirect()->route('posts.show', ['id' => $postId]);
    }
}
