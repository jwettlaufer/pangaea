<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comment;
use App\Profile;
use App\Like;
use Auth;
use PhpParser\Node\Expr\PostDec;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::query()
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select(
                'posts.id',
                'users.id as user_id',
                'users.name',
                'posts.message'
            )
            ->orderBy('posts.id', 'desc')
            ->SimplePaginate(6);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = Auth::user();
        if ($user)
            return view('posts.create');
        else
            return redirect('/posts');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if ($user = Auth::user()) {
            $validatedData = $request->validate(array(
                'message' => 'required|max:240'
            ));
            $post = new Post;
            $post->user_id = $user->id;
            $post->message = $validatedData['message'];
            if (isset($request->is_gif) && $request->is_gif === 'true') {
                $post->is_gif = true;
            }
            $post->save();

            return redirect('/posts')->with('success', 'Post has been saved.');
        }
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::findOrFail($id);

        $postUser = User::findOrFail($post->user_id);
        return view('posts.show', compact('post', 'postUser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if ($user = Auth::user()) {
            $post = Post::findOrFail($id);

            return view('posts.edit', compact('post'));
        }

        return redirect('/posts');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if ($user = Auth::user()) {
            $validatedData = $request->validate(array(
                'message' => 'required|max:240'
            ));

            $post = Post::findOrFail($id);

            if (isset($request->is_gif) && $request->is_gif === 'true') {
                $post->is_gif = true;
            } else $post->is_gif = false;

            Post::whereId($id)->update($validatedData);

            return redirect('/posts')->with('success', 'post has been updated.');
        }
        // Redirect by default.
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if ($user = Auth::user()) {
            $post = Post::findOrFail($id);

            $post->delete();

            return redirect('/posts')->with('success', 'post has been deleted.');
        }
        return redirect('/posts');
    }

   /**
     * like a particular post
     *
     * @param  Post $post
     * @return Response
     */
    public function likePost(Post $post)
    {
        Auth::user()->likes()->attach($post->id);

        return back();
    }

    /**
     * Unlike a particular post
     *
     * @param  Post $post
     * @return Response
     */
    public function unLikePost(Post $post)
    {
        Auth::user()->likes()->detach($post->id);

        return back();
    }
}
