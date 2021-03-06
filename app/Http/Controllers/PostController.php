<?php

namespace App\Http\Controllers;

use App\PostImage;
use Exception;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
    private $postImage;
    public function __construct()
    {

        //$this->middleware('auth');
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
      try{
        return view('posts.index',
          ['posts'=>Post::orderBy('created_at','desc')->paginate(12)]); //change for class
      }catch(Exception $e){
        dd($e);
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      try{
        if(Auth::user()->role=="user" || Auth::user()->role=="admin"){
          Session::flash('message-error', 'No tiene los permisos para crear contenido.');
          return $this->index();
        }
        return view('posts.create');
      }catch(Exception $e){
        Session::flash('message-error', 'No tiene los permisos para crear contenido.');
        return $this->index();
        dd($e);
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
      try{
        //Auth::user()->posts()->create($request->all());
        $post = $request->user()->posts()->create($request->all());
        PostImage::create([
          'image'=>$request->image,
          'user_id'=>$post->user_id,
          'post_id'=>$post->id,
        ]);
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
      }catch(Exception $e){
        Session::flash('message-error', 'No tiene los permisos para crear contenido.');
        return $this->index();
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      try{
        $this->post = Post::findOrFail($id);
        return view('posts.show',
          ['post'=>$this->post, 'comments'=>$this->post->comments]);
      }catch(ModelNotFoundException $e){ // catch(Exception $e) catch any exception
        Session::flash('message-error', 'El post buscado no existe.');
        return Redirect::to('/posts');
        //dd($e->getMessage());
        //dd(get_class_methods($e)); // lists all available methods for exception object
        //dd($e);
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      try
      {
        $this->post = Post::findOrFail($id);
        if(!Auth::check() || $this->post->user_id != Auth::user()->id){
          Session::flash('message-error', 'No tiene los permisos para modificar este contenido.');
          return view('posts.show', ['post'=>$this->post, 'comments'=>$this->post->comments]);
        }
        return view('posts.edit', ['post' => $this->post]);
        //dd($role);
      } // catch(Exception $e) catch any exception
      catch(ModelNotFoundException $e)
      {
        Session::flash('message-error', 'El post buscado no existe.');
        return Redirect::to('/posts');
        //dd($e->getMessage());
        //dd(get_class_methods($e)); // lists all available methods for exception object
        //dd($e);
      }
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
      try{
        $this->post = Post::findOrFail($id);
        $this->post->fill($request->all());

        $this->postImage = PostImage::where('post_id', $this->post->id)->first();
        $this->postImage->image = $request->image;
        $this->postImage->save();

        $this->post->save();
        Session::flash('message', 'Post editado correctamente');
        return Redirect::to('/posts');

      }catch(ModelNotFoundException $e){ // catch(Exception $e) catch any exception
        Session::flash('message-error', 'El post a modificar no existe.');
        return Redirect::to('/posts');
        //dd($e->getMessage());
        //dd(get_class_methods($e)); // lists all available methods for exception object
        //dd($e);
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
        try
        {
            $this->post = Post::findOrFail($id);
            $this->post->delete();
            Session::flash('message', 'Post eliminado correctamente');
            return Redirect::to('/posts');

        } // catch(Exception $e) catch any exception
        catch(ModelNotFoundException $e)
        {
            Session::flash('message-error', 'El post especificado no existe.');
            return Redirect::to('/posts');
            //dd($e->getMessage());
            //dd(get_class_methods($e)); // lists all available methods for exception object
            //dd($e);
        }
    }
}
