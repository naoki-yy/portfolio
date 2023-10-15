<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id','desc')->paginate(4);
        // $posts = Post::findorfail();

        $data = [
            'users' => $users,
            // 'posts' => $posts,
        ];

        return view('users.users', $data);
    }

    public function mypage()
    {
        $user = \Auth::user();
        $posts = Post::where('user_id', $user->id)->get();

        // $posts = $user->posts->get();
        $data = [
            'user' => $user,
            'posts' => $posts,
        ];
        $data += $this->userCounts($user);
        return view("users.mypage", $data);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $posts = $user->posts()->orderBy('id', 'desc')->paginate(4);
        $data=[
            'user' => $user,
            'posts' => $posts,
        ];
        $data += $this->userCounts($user);
        return view('users.show',$data);
    }
};
