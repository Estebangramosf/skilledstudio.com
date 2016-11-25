<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        try
        {
            $this->post = Post::findOrFail($id);
            $this->post->comments()->create([
                'user_id'=>Auth::user()->id,
                'title'=>$request->title,
                'body'=>$request->body,
            ]);
            Session::flash('message', 'Comentario agregado correctamente');
            return Redirect::to('/posts/'.$this->post->id);

        } // catch(Exception $e) catch any exception
        catch(ModelNotFoundException $e)
        {
            Session::flash('message-error', 'El post buscado no existe.');
            return Redirect::to('/post');
            //dd($e->getMessage());
            //dd(get_class_methods($e)); // lists all available methods for exception object
            //dd($e);
        }

        //dd($id);
        //$comment = $post->comments()->save($comment);
        //dd($request);
        //dd($request->user()->posts());
        //Auth::user()->posts()->create($request->all());
        //$request->user()->posts()->create($request->all());
        /*
        dd($request->user()->posts()->create([
            'title'=>$request->title,
            'body'=>$request->body,
            'user_id'=>'',
        ])
        );*/
        //Post::create($request->all());
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
    public function update(Request $request, $id)
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
