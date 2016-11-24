<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\posts\PostCreateRequest;
use App\Http\Requests\posts\PostUpdateRequest;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    private $post;
    public function __construct()
    {
        $this->middleware('auth');
        /*
        $this->middleware('log', ['only' => [
          'fooAction',
          'barAction',
        ]]);
        */
        //This middleware apply only for
        /*
        $this->middleware('role', ['only' => [
            //'show',
        ]]);
        */

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index', ['posts'=>Post::all()]); //change for class
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
        //Auth::user()->posts()->create($request->all());
        $request->user()->posts()->create($request->all());
        /*
        dd($request->user()->posts()->create([
            'title'=>$request->title,
            'body'=>$request->body,
            'user_id'=>'',
        ])
        );*/
        //Post::create($request->all());

        Session::flash('message', 'Post creado correctamente');
        return Redirect::to('/posts/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
