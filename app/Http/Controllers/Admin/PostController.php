<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
	public function __construct()
	{
		$this->middleware('can:admin.posts.index')->only('index');
		$this->middleware('can:admin.posts.create')->only('create', 'store');
		$this->middleware('can:admin.posts.delete')->only('destroy');
		$this->middleware('can:admin.posts.edit')->only('edit, update');
	}

	public function index()
	{
		//
		return view('admin.posts.index');
	}


	public function create()
	{
		//
		// name es el valor y id la llave
		$categories = Category::pluck('name', 'id');
		$tags = Tag::all();
		return view('admin.posts.create', compact('categories', 'tags'));
	}

	public function store(PostRequest $request)
	{
		// Esto me permite mover la imagen al storage
		// return Storage::put('posts', $request->file('file'));
		// return $request->file('file');

		// pasa las validacion
		//
		$post = Post::create($request->all());

		if ($request->file('file')) {
			$url =	Storage::put('public/posts', $request->file('file'));
			$post->image()->create([
				'url' => $url
			]);
		};

		if ($request->tags) {
			$post->tags()->attach($request->tags);
		};
		return redirect()->route('admin.posts.edit', $post);
	}

	public function edit(Post $post)
	{
		$this->authorize('author', $post);
		$categories = Category::pluck('name', 'id');
		$tags = Tag::all();
		return view('admin.posts.edit', compact('post', 'categories', 'tags'));
	}

	public function update(PostRequest $request, Post $post)
	{
		$this->authorize('author', $post);

		$post->update($request->all());

		if ($request->file('file')) {
			$url =	Storage::put('public/posts', $request->file('file'));
			if ($post->image) {
				// en el caso que exista una imagen se elimina la vieja
				Storage::delete($post->image->url);
				$post->image->update([
					'url' => $url
				]);
			} else {
				$post->image()->create([
					'url' => $url
				]);
			}
		};
		// sincroniza con los registro de la table intermedio
		if ($request->tags) {
			$post->tags()->sync($request->tags);
		};
		return redirect()->route('admin.posts.edit', $post)->with('info', 'Modificacion realizada');
	}

	public function destroy(Post $post)
	{
		$this->authorize('author', $post);

		$post->delete();
		return redirect()->route('admin.posts.index', $post)->with('info', 'Eliminado con realizo');
	}
}
