<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class UsersController extends Controller
{
    public function index()
    {
        
        $posts = Post::orderBy('id','desc')->paginate(4);

        $data = [
            // 'users' => $users,
            'posts' => $posts,
        ];

        return view('users.users', $data);
    }

    public function top()
    {

        return view('top');
    }

    public function mypage()
    {
        $user = \Auth::user();
        $posts = Post::where('user_id', $user->id)->paginate(4);
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
        // $posts = Post::orderBy('id','desc')->paginate(4);
        $data=[
            'user' => $user,
            'posts' => $posts,
        ];
        $data += $this->userCounts($user);
        return view('users.show',$data);
    }

    public function destroy($id)
    {
        $user = \Auth::user();
        $user->delete();
        return back();
    }

    public function favorites($id)
    {
        $user = User::findOrFail($id);
        $posts = $user->favorites()->paginate(4);
        $data=[
            'user' => $user,
            'posts' => $posts,
        ];
        $data += $this->userCounts($user);
        return view('users.show', $data);
}
};