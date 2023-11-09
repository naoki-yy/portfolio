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
        $post->template_id = $request->template_id;


        $post->recommendation_point1 = $request->recommendation_point1;
        $post->recommendation_text1 = $request->recommendation_text1;
        $post->recommendation_point2 = $request->recommendation_point2;
        $post->recommendation_text2 = $request->recommendation_text2;
        $post->recommendation_point3 = $request->recommendation_point3;
        $post->recommendation_text3 = $request->recommendation_text3;

        if ($request->hasFile('cover_image_path')) {
            $path1 = Storage::disk('s3')->putFile('tabilog', $request->file('cover_image_path'), 'public');
            $post->cover_image_path = Storage::disk('s3')->url($path1);
        } else {
            $post->cover_image_path = asset('image/no_image.jpg'); 
        }

        if ($request->hasFile('recommendation_image1')) {
            $path2 = Storage::disk('s3')->putFile('tabilog', $request->file('recommendation_image1'), 'public');
            $post->recommendation_image1 = Storage::disk('s3')->url($path2);
        } else {
            $post->recommendation_image1 = asset('image/no_image.jpg'); 
        }
        
        if ($request->hasFile('recommendation_image2')) {
            $path3 = Storage::disk('s3')->putFile('tabilog', $request->file('recommendation_image2'), 'public');
            $post->recommendation_image2 = Storage::disk('s3')->url($path3);
        } else {
            $post->recommendation_image2 = asset('image/no_image.jpg'); 
        }
        
        if ($request->hasFile('recommendation_image3')) {
            $path4 = Storage::disk('s3')->putFile('tabilog', $request->file('recommendation_image3'), 'public');
            $post->recommendation_image3 = Storage::disk('s3')->url($path4);
        } else {
            $post->recommendation_image3 = asset('image/no_image.jpg'); 
        }
        
        $post->save();
        
 
        return redirect()->route('/');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if (\Auth::id() === $post->user_id) {
            $coverImageURL = $post->cover_image_path;
            $recommendationImage1URL = $post->recommendation_image1;
            $recommendationImage2URL = $post->recommendation_image2;
            $recommendationImage3URL = $post->recommendation_image3;
        
            $post->delete();
        
            $coverImageURL = str_replace('https://tabilog-image.s3.ap-northeast-1.amazonaws.com/', '', $coverImageURL);
            $recommendationImage1URL = str_replace('https://tabilog-image.s3.ap-northeast-1.amazonaws.com/', '', $recommendationImage1URL);
            $recommendationImage2URL = str_replace('https://tabilog-image.s3.ap-northeast-1.amazonaws.com/', '', $recommendationImage2URL);
            $recommendationImage3URL = str_replace('https://tabilog-image.s3.ap-northeast-1.amazonaws.com/', '', $recommendationImage3URL);
    
            Storage::disk('s3')->delete($coverImageURL);
            Storage::disk('s3')->delete($recommendationImage1URL);
            Storage::disk('s3')->delete($recommendationImage2URL);
            Storage::disk('s3')->delete($recommendationImage3URL);
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
        $post = Post::findOrFail($id);

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


        if ($request->hasFile('cover_image_path')) {
            $existingPath = parse_url($post->cover_image_path, PHP_URL_PATH);
            $existingPath = ltrim($existingPath, '/'); 
            if ($existingPath && Storage::disk('s3')->exists($existingPath)) {
                Storage::disk('s3')->delete($existingPath);
            }
            $path1 = Storage::disk('s3')->putFile('tabilog', $request->file('cover_image_path'), 'public');
            $post->cover_image_path = Storage::disk('s3')->url($path1);
        }else {
            $post->cover_image_path = asset('image/no_image.jpg'); 
        }

        if ($request->hasFile('recommendation_image1')) {
            $existingPath = parse_url($post->recommendation_image1, PHP_URL_PATH);
            $existingPath = ltrim($existingPath, '/'); 
            if ($existingPath && Storage::disk('s3')->exists($existingPath)) {
                Storage::disk('s3')->delete($existingPath);
            }
            $path1 = Storage::disk('s3')->putFile('tabilog', $request->file('recommendation_image1'), 'public');
            $post->recommendation_image1 = Storage::disk('s3')->url($path1);
        }else {
            $post->recommendation_image1 = asset('image/no_image.jpg'); 
        }
        
        if ($request->hasFile('recommendation_image2')) {
            $existingPath = parse_url($post->recommendation_image2, PHP_URL_PATH);
            $existingPath = ltrim($existingPath, '/'); 
            if ($existingPath && Storage::disk('s3')->exists($existingPath)) {
                Storage::disk('s3')->delete($existingPath);
            }
            $path1 = Storage::disk('s3')->putFile('tabilog', $request->file('recommendation_image2'), 'public');
            $post->recommendation_image2 = Storage::disk('s3')->url($path1);
        }else {
            $post->recommendation_image2 = asset('image/no_image.jpg'); 
        }
        
        if ($request->hasFile('recommendation_image3')) {
            $existingPath = parse_url($post->recommendation_image3, PHP_URL_PATH);
            $existingPath = ltrim($existingPath, '/'); 
            if ($existingPath && Storage::disk('s3')->exists($existingPath)) {
                Storage::disk('s3')->delete($existingPath);
            }
            $path1 = Storage::disk('s3')->putFile('tabilog', $request->file('recommendation_image3'), 'public');
            $post->recommendation_image3 = Storage::disk('s3')->url($path1);
        } else {
            $post->recommendation_image3 = asset('image/no_image.jpg'); 
        }

        $post->save();
        
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

public function showAreaPosts($place)
{
    $posts = Post::where('area', 'LIKE', "%{$place}%")->orderBy('id', 'desc')->paginate(4);
    
    return view('posts.area_posts', compact('posts','place'));
}



    }

