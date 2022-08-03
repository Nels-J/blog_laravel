<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use function Symfony\Component\String\s;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::withCount('comments')->latest()->paginate(20);
        return view('dashboard', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.postcreate'); // returning the view with the form to create a new post
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //fixme #8
        $validated = $request->validate([
            'title' => ['required','max:255'],
            'article' => ['required'],
            'user_id' => ['required','exists:App\Models\User,id'],
        ]);

        $newPost = new Post;
        $newPost->title = $validated['title'];
        $newPost->article = $validated['article'];
        $newPost->user_id = $validated->user()->id;
        $newPost->save();

//        $newPost = new Post;
//        $newPost->title = $request->title;
//        $newPost->article = $request->article;
//        $newPost->user_id = $request->user()->id;
//        $newPost->save();

        //Then redirect user to the all product view to see the new entry in the list
        return redirect()->route('dashboard');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
