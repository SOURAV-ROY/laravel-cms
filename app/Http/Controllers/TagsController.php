<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Http\Requests\Tags\CreateTagRequest;
use App\Http\Requests\Tags\UpdateTagRequest;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        GET COLLECTIONS ***************************************************

//        dd(Tag::first()->posts()->where('published_at', now())->get());
//        dd(Tag::first()->posts()->get());

//        dd(Tag::first()->posts);

        return view('tags.index')->with('tags', Tag::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateTagRequest $request)
    {
        //
//        $this->validate($request, [
//
//            'name' => 'required|unique:tags'
//
//        ]);

//        $newTag = new Tag();

        Tag::create([

            'name' => $request->name
        ]);

        session()->flash('success', 'Tag Created Successfully');

        return redirect(route('tags.index'));
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

    public function edit(Tag $tag)
    {
        return view('tags.create')->with('tag', $tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function update(UpdateTagRequest $request, Tag $tag)
    {
//        $tag->name = $request->name;
//        $tag->save();

        $tag->update([

            'name' => $request->name
        ]);

        session()->flash('success', 'Tag Updated Successfully');

        return redirect(route('tags.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Tag $tag)
    {
        if ($tag->posts->count() > 0) {

            session()->flash('error', 'Tag Can Not Be Deleted Because It Has Some Posts!!!');

            return redirect()->back();
        }

        $tag->delete();

        session()->flash('success', 'Tag Deleted Successfully !!!');

        return redirect(route('tags.index'));
    }
}
