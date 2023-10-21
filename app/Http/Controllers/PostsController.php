<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {
        $post = new Post;

        $post->user_id = $request->user()->id;
        
        $post->title = $request->title;
        $post->concept = $request->concept;
        $post->area = $request->area;
        $post->recommendation_point1 = $request->recommendation_point1;
        $post->recommendation_text1 = $request->recommendation_text1;
        $post->recommendation_point2 = $request->recommendation_point2;
        $post->recommendation_text2 = $request->recommendation_text2;
        $post->recommendation_point3 = $request->recommendation_point3;
        $post->recommendation_text3 = $request->recommendation_text3;


        $post -> cover_image_path = $this->saveImage($request->file('cover_image_path'));

        $post->recommendation_image1 = $this->saveImage($request->file('recommendation_image1'));  
        $post->recommendation_image2 = $this->saveImage($request->file('recommendation_image2')); 
        $post->recommendation_image3 = $this->saveImage($request->file('recommendation_image3')); 
        $post->save();
        // return back();
        return redirect()->route('/');
    }

    private function saveImage($image)
    {
        
        if($image !== null){

            $imgPath = $image->store('image', 'public');

        return 'storage/' . $imgPath;
        }
        return null;
    }


    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if (\Auth::id() === $post->user_id) {
            $coverImagePath = str_replace('storage/image/', '', $post->cover_image_path);
            $recImage1 = str_replace('storage/image/', '', $post->recommendation_image1);
            $recImage2 = str_replace('storage/image/', '', $post->recommendation_image2);
            $recImage3 = str_replace('storage/image/', '', $post->recommendation_image3);
    
            Storage::disk('public')->delete('image/' . $coverImagePath);
            Storage::disk('public')->delete('image/' . $recImage1);
            Storage::disk('public')->delete('image/' . $recImage2);
            Storage::disk('public')->delete('image/' . $recImage3);
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

    public function edit($id)
    {
        $user = \Auth::user();
        $post = Post::findOrFail($id);
        $data=[
            'user' => $user,
            'post' => $post,
        ];
        return view('posts.edit', $data);
    }
    public function update(PostRequest $request, $id)
    {
        $post = new Post;

        $post->user_id = $request->user()->id;
        
        $post->title = $request->title;
        $post->concept = $request->concept;
        $post->area = $request->area;
        $post->recommendation_point1 = $request->recommendation_point1;
        $post->recommendation_text1 = $request->recommendation_text1;
        $post->recommendation_point2 = $request->recommendation_point2;
        $post->recommendation_text2 = $request->recommendation_text2;
        $post->recommendation_point3 = $request->recommendation_point3;
        $post->recommendation_text3 = $request->recommendation_text3;


        $post -> cover_image_path = $this->saveImage($request->file('cover_image_path'));

        $post->recommendation_image1 = $this->saveImage($request->file('recommendation_image1'));  
        $post->recommendation_image2 = $this->saveImage($request->file('recommendation_image2')); 
        $post->recommendation_image3 = $this->saveImage($request->file('recommendation_image3')); 
        $post->save();
        // return back();
        return redirect()->route('/');
    }


    public function index(Request $request)
{
    $keyword = $request->input('keyword');
    $searchOptions = $request->input('search_option');

    $query = Post::query();

    if (!empty($keyword)) {
        // セレクトボタンで選択された検索オプションに基づいてクエリを構築します
        if (in_array('title', $searchOptions)) {
            $query->orWhere('title', 'LIKE', "%{$keyword}%");
        }
        if (in_array('area', $searchOptions)) {
            $query->orWhere('area', 'LIKE', "%{$keyword}%");
        }
        if (in_array('name', $searchOptions)) {
            // usersテーブルのnameカラムを対象に検索
            $query->orWhereHas('user', function ($subQuery) use ($keyword) {
                $subQuery->where('name', 'LIKE', "%{$keyword}%");
            });
        }
        

        $posts = $query->orderBy('id', 'desc')->paginate(4);
    } else {
        $posts = Post::orderBy('id', 'desc')->paginate(4);
    }

    return view('posts.search', ['posts' => $posts]);
}


    }

