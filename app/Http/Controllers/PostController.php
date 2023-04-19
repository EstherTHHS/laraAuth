<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::where('user_id', Auth::user()->id)->get();
        $posts = Post::all();

        return view('home', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addPost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'about' => 'required'
        ]);
        Post::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'about' => $request->about,
        ]);
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $datas = Post::where('id', $id)->first();
        $datas = Post::find($id);
        return view('viewPost', compact('datas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $result = Post::find($id);
        // dd($result);
        if ($result->user_id === Auth::user()->id) {
            return view('editPost', compact('result'));
        } else {
            return abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $result = Post::where('id', $id)->first();
        if ($result->user_id === Auth::user()->id) {
            $result->update($request->all());
            return redirect()->route('post.index');
        } else {
            return abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Post::where('id', $id)->first();
        if ($result->user_id === Auth::user()->id) {
            $result->delete();
            return redirect()->route('post.index');
        }
        return abort(404);
    }
}
