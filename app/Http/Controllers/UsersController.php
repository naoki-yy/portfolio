<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Day;
use App\Schedule;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id','desc')->paginate(4);
        $posts = Post::find(1);
        $days = Day::find(1);
        $schedules = Schedule::find(1);

        $data = [
            'users' => $users,
            'posts' => $posts,
            "days" => $days,
            "schedules" => $schedules,
        ];

        return view('users.users', $data);
    }
}
