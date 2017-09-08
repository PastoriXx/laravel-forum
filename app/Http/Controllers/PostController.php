<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate();

        return view('post.index', compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Post::findOrFail($id);
        $comments = $model->comments()->paginate();

        return view('post.show', compact('model', 'comments'));
    }

    /**
     * Сreate resource.
     *
     * @param  Request $request
     * @return \View
     */
    public function create()
    {
        $model = new Post();

        return view('post.create', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $model = Post::create($request->all());

        return redirect()->route('posts.show', ['id' => $model->id])->with('status', trans('post.created'));
    }

    /**
     * Edit resource
     *
     * @param  integer $id
     * @return \View
     */
    public function edit($id)
    {
        $model = Post::allowed()->findOrFail($id);

        return view('post.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PostRequest $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $model = Post::allowed()->findOrFail($id);
        $model->update($request->all());

        return redirect()->route('posts.show', ['id' => $id])->with('status', trans('post.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Post::allowed()->findOrFail($id);
        $model->delete();

        return redirect('posts')->with('status', trans('post.deleted'));
    }
}
