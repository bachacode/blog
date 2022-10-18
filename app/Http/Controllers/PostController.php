<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Tag;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Post::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create',[
            'tags' => Tag::all(),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->body = $request->body;
        $post->user_id = Auth::user()->id;
        $post->category_id = $request->category_id;
        $post->published_at = $request->published_at;
        $post->meta_description = $request->meta_description;

        if($request->hasFile('cover_image')){
            $image = $request->file('cover_image');
            $imageName = $image->getClientOriginalName();
            $imageNewName = explode('.', $imageName)[0];
            $fileExtension = time() . '.' . $imageNewName . '.' . $image->getClientOriginalExtension();
            $location = storage_path('app/public/images/' . $fileExtension);
            Image::make($image)->resize(1200, 630)->save($location);

            $post->cover_image = $fileExtension;
        }
        $post->save();
        $post->tags()->sync($request->tags);
        return to_route('posts.index')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {   
        $tags = Tag::all();
        $categories = Category::all();
        $oldTags = $post->tags->pluck('id')->toArray();
        return view('dashboard.posts.edit', compact('post', 'tags', 'categories', 'oldTags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->body = $request->body;
        $post->user_id = Auth::user()->id;
        $post->category_id = $request->category_id;
        $post->published_at = $request->published_at;
        $post->meta_description = $request->meta_description;

        if($request->hasFile('cover_image')){
            $oldFileName = $post->cover_image;
            $image = $request->file('cover_image');
            $imageName = $image->getClientOriginalName();
            $imageNewName = explode('.', $imageName)[0];
            $fileExtension = time() . '.' . $imageNewName . '.' . $image->getClientOriginalExtension();
            $location = storage_path('app/public/images/' . $fileExtension);
            Image::make($image)->resize(1200, 630)->save($location);
            $post->cover_image = $fileExtension;

            File::delete(storage_path('app/public/images/' . $oldFileName));
        }

        $post->save();
        $post->tags()->sync($request->tags);

        return to_route('posts.index')->with('success', 'Post successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
