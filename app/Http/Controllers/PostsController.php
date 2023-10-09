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
        $user = \Auth::user();
        $posts = $user->posts()->orderBy('id', 'desc')->paginate(4);

        foreach($posts as $post) {
            $days = $post->days()->get();
                foreach($days as $day) {
                    $schedules = $day->schedules()->get();
                };
        };

        $data = [
            'user' => $user,
            'posts' => $posts,
        ];
        return view('posts.create', $data);
    }

    public function store(PostRequest $request)
    {
        $post = new Post;
        $day = new Day;
        $schedule = new Schedule;
        
        $post->cover_image = $request->cover_image;
        $day->day_count = $request->day_count;
        $schedule->title = $request->title;
        $schedule->concept = $request->concept;
        $schedule->area = $request->area;
        $schedule->triptime = $request->triptime;
        $schedule->heading = $request->heading;
        $schedule->body = $request->body;
        $schedule->traffic = $request->traffic;
        $schedule->traffic_detail = $request->traffic_detail;

        $post->user_id = $request->user()->id;
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
}
