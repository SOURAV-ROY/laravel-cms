<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Category;
use App\Tag;
use App\Post;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('verifyCategoriesCount')->only('create', 'store');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with('categories', Category::all())->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
//        dd($request->all());
//*********************Upload the image to storage *******************

//        dd($request->image->store('posts'));
        $image = $request->image->store('posts');

//********************* Post Create *******************
        $post = Post::create([

            'title' => $request->title,
            'description' => $request->description,
            'subtitle' => $request->subtitle,
            'image' => $image,
            'published_at' => $request->published_at,
            'category_id' => $request->category
        ]);

        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }
//********************* Session message *******************
        session()->flash('success', 'POST Create successfully!');

//********************* Redirect *******************
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
//        dd($post->tags->pluck('id')->toArray());

        return view('posts.create')->with('post', $post)->with('categories', Category::all())->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->only('title', 'description', 'subtitle', 'published_at');

//        New IMAGE************
        if ($request->hasFile('image')) {
//            Upload Image*******************
            $image = $request->image->store('posts');

//          Delete image **************************
//          Storage::delete($post->image);

            $post->deleteImage();

            $data['image'] = $image;
        }

//**********************Tags Update Selected ***************************************
        if ($request->tags){
            $post->tags()->sync($request->tags);
        }

//****************Update Attributes **************
        $post->update($data);

        session()->flash('success', 'Post Updated successfully ✔');

        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id', 'LIKE', $id)->firstOrFail();

        if ($post->trashed()) {

//          Deleted Permanently Form Storage *****************
//            Storage::delete($post->image);

            $post->deleteImage();

            $post->forceDelete();

        } else {

            $post->delete();
        }
//********************* Session message *******************
        session()->flash('success', 'Post Deleted successfully 😜');

//********************* Redirect ********************************
        return redirect(route('posts.index'));
    }

    /**
     * Display all trashed of post .
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function trashed()
    {
        $trashed = Post::onlyTrashed()->get();

        return view('posts.index')->with('posts', $trashed);
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', 'LIKE', $id)->firstOrFail();

        $post->restore();

        //********************* Session message *******************
        session()->flash('success', 'Post Restore successfully 💚');

        return redirect()->back();
    }
}
