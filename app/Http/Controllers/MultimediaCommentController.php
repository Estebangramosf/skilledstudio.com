<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\comments\MultimediaCommentCreateRequest;
use App\Http\Requests\comments\MultimediaCommentDestroyRequest;
use App\Multimedia;
use Exception;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class MultimediaCommentController extends Controller
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
    public function store(MultimediaCommentCreateRequest $request, $id)
    {
        try
        {
            sleep(1);
            $this->multimedia = Multimedia::findOrFail($id);
            $this->multimedia->comments()->create([
                'user_id'=>Auth::user()->id,
                'title'=>$request->title,
                'body'=>$request->body,
            ]);
            Session::flash('message', 'Comentario agregado correctamente');
            return Redirect::to('/multimedia/'.$this->multimedia->id);

        } // catch(Exception $e) catch any exception
        catch(ModelNotFoundException $e)
        {
            Session::flash('message-error', 'El post buscado no existe.');
            return Redirect::to('/multimedia');
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
    public function destroy(Request $request)
    {
      try{
        //return $request->user()->id;
        if ( $request->ajax() ) {

          $this->comment_id=(int)base64_decode($request->comment_id);
          $this->post_id=(int)base64_decode($request->post_id);

          if(is_numeric($this->comment_id) && is_numeric($this->post_id)){
            $this->post = Post::findOrFail($this->post_id);
            $this->comment = Comment::findOrFail($this->comment_id);

            if(Auth::check() &&
              (Auth::user()->role=='editor' &&
              $this->comment->user->role!='admin') || //si se saca esta linea se puede permitir eliminar el post del admin
              $this->comment->user_id==Auth::user()->id ||
              Auth::user()->role=='admin'){

                if ($this->comment->delete() ){
                  return response()->json(json_decode(json_encode([ 'result_detail' => 'Comentario elimiando','status' => 0,])));
                }else{
                  return response()->json(json_decode(json_encode([ 'result_detail' => 'Error al eliminar','status' => 1,])));
                }


            }
          }



        }


      }catch(Exception $e){

      }






      /*
      return response()->json(
        [
          'comment_id'=>base64_decode($request->comment_id),
          'post_id'=>base64_decode($request->post_id)
        ]);
      */
    }
}
