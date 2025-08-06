<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index(){
        $all_posts = Post::all();
        return view("posts.index",["posts" => $all_posts]);
    }

    public function show(Post $post){
        // $post = Post::where('id',$post_id)->first();
        // $post = Post::findOrfail($post_id);


        return view('posts.show',["post" => $post]);
    }

    
    public function create(){

        $users = User::all();

        return view('posts.create', ['users' => $users]);
    }

    public function store(){


        request()->validate([
            'title' => ['required','min:3'],
            'description' => ['required','min:5'],
            'post_creator' => ['required', 'exists:users,id']
        ]);


        
        // $data = request()->all();
        $title = request()->title;
        $description = request()->description;
        $post_creator = request()->post_creator;
        // dd($title, $description);

        // $post = new Post;
        // $post->title = $title;
        // $post->description = $title;
        // $post->save();

        Post::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $post_creator,
        ]);


        return to_route('index');
    }

    public function edit(Post $post){

        $users = User::all();
        return view('posts.edit', compact('users','post'));
    }

    public function update(Post $post){

        // $data = request()->all();
        // $post = Post::find($postId);
        $post->update([
            'title' => request()->title,
            'description' => request()->description,
            'user_id' => request()->post_creator,

        ]);
        return to_route('show',$post);
    }

    public function destroy(Post $post){

        $post->delete();
        return to_route('index');
    }
}
