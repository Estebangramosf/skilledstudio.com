<?php

namespace App\Http\Controllers;

use App\Http\Requests\multimedia\MultimediaCreateRequest;
use App\Http\Requests\multimedia\MultimediaUpdateRequest;
use App\Multimedia;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\BinaryOp\Mul;

class MultimediaController extends Controller
{
    private $multimedia;
    private $multimedias;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->multimedias = Multimedia::orderBy('created_at','desc')->paginate(12);
        return view('multimedia.index', ['multimedias' => $this->multimedias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('multimedia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MultimediaCreateRequest $request)
    {
        $this->multimedia = $request->user()->multimedia()->create($request->all());
        Session::flash('message', 'Contenido multimedia creado correctamente');
        return Redirect::to('/multimedia/'.$this->multimedia->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try
        {
            $this->multimedia = Multimedia::findOrFail($id);
            return view('multimedia.show', ['multimedia'=>$this->multimedia /*,'comments'=>$this->post->comments*/]);
        }
        catch(ModelNotFoundException $e)
        {
            Session::flash('message-error', 'El contenido multimedia buscado no existe.');
            return Redirect::to('/multimedia');
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
            $this->multimedia = Multimedia::findOrFail($id);
            return view('multimedia.edit', ['multimedia' => $this->multimedia]);
        }
        catch(ModelNotFoundException $e)
        {
            Session::flash('message-error', 'El contenido multimedia no existe.');
            return Redirect::to('/multimedia');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MultimediaUpdateRequest $request, $id)
    {
        try
        {
            $this->multimedia = Multimedia::findOrFail($id);
            $this->multimedia->fill($request->all());
            $this->multimedia->save();
            Session::flash('message', 'Contenido multimedia editado correctamente');
            return Redirect::to('/multimedia');

        }
        catch(ModelNotFoundException $e)
        {
            Session::flash('message-error', 'Contenido multimedia a modificar no existe.');
            return Redirect::to('/multimedia');
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
            $this->multimedia = Multimedia::findOrFail($id);
            $this->multimedia->delete();
            Session::flash('message', 'Contenido multimedia eliminado correctamente');
            return Redirect::to('/multimedia');

        }
        catch(ModelNotFoundException $e)
        {
            Session::flash('message-error', 'El contenido multimedia especificado no existe.');
            return Redirect::to('/multimedia');
        }
    }
}
