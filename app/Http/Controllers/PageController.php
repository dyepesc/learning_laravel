<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
	public function home(Request $request)
	{
		// dd($_REQUEST);
		// dd($request->all());
		
		$search = $request->search;

		$posts = Post::where('title', 'LIKE', "%{$search}%")
			->with('user') //hacer las consultas de los usuarios en el controlador y no la vista
			->latest()->paginate();

		return view('home', compact('posts'));
    }

    public function post(Post $post) 
    {
        return view('post', ['post' => $post]);
    }
}