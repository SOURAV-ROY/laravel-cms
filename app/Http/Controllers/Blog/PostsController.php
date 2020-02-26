<?php

namespace App\Http\Controllers\Blog;

use App\Category;
use App\Tag;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show(Post $post)
    {
        return view('blog.show')->with('post', $post);
    }

    public function category(Category $category)
    {
        $search = request()->query('search');

        if ($search) {

            $posts = $category->posts()
                ->where('title', 'LIKE', "%{$search}%")->simplePaginate(1);

        } else {

            $posts = $category->posts()->simplePaginate(4);
        }

        return view('blog.category')
            ->with('category', $category)
            ->with('posts', $posts)
//            ->with('posts', $category->posts()->simplePaginate(2))
            ->with('categories', Category::all())
            ->with('tags', Tag::all());
    }

    public function tag(Tag $tag)
    {
        return view('blog.tag')->with('tag', $tag)
            ->with('posts', $tag->posts()->simplePaginate(2));
    }
}
