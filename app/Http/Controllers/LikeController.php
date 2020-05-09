<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;
use App\Post;
use App\User;

class LikeController extends Controller
{
    public function Like ( $id )
    {
        $post = Post::findOrFail( $id );
        $post->save();
        return $post;
    }

    public function unlike ( $id )
    {
        $post = Post::findOrFail( $id );
        $post->save();
        return $post;
    }
}