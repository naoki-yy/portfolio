<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Day;
use App\Schedule;
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {
        $post = new Post;
        
        $post->cover_image = $request->cover_image;


        $post->user_id = $request->user()->id;
        
        $post->title = $request->title;
        $post->concept = $request->concept;
        $post->area = $request->area;
        $post->recommendation_point1 = $request->recommendation_point1;
        $post->recommendation_image1 = $request->recommendation_image1;
        $post->recommendation_text1 = $request->recommendation_text1;
        $post->recommendation_point2 = $request->recommendation_point2;
        $post->recommendation_image2 = $request->recommendation_image2;
        $post->recommendation_text2 = $request->recommendation_text2;
        $post->recommendation_point3 = $request->recommendation_point3;
        $post->recommendation_image3 = $request->recommendation_image3;
        $post->recommendation_text3 = $request->recommendation_text3;

        $post->save();
        return back();
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if (\Auth::id() === $post->user_id) {
            $post->delete();
        }
        return back();
    }

    public function log($user_id, $id)
    {
        $user = User::find($user_id);
        $post = Post::find($id);
        $data = [
            'user' => $user,
            'post' => $post,
        ];

        return view('users.log', $data);
    }

    }

