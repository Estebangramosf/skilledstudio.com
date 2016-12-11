<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Http\Requests\galleries\GalleryCreateRequest;
use App\Http\Requests\galleries\GalleryUpdateRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class GalleryController extends Controller
{
    private $galleries;
    private $gallery;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->galleries = Gallery::all();
        return view('gallery.index', ['galleries' => $this->galleries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryCreateRequest $request)
    {
      $gallery = $request->user()->galleries()->create($request->all());
      Session::flash('message', 'Galería creada correctamente');
      return Redirect::to('/galleries/'.$gallery->id);
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
            $this->gallery = Gallery::findOrFail($id);
            return view('gallery.show', ['gallery'=>$this->gallery /*,'comments'=>$this->post->comments*/]);
        }
        catch(ModelNotFoundException $e)
        {
            Session::flash('message-error', 'La galería buscada no existe.');
            return Redirect::to('/galleries');
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
            $this->gallery = Gallery::findOrFail($id);
            return view('gallery.edit', ['gallery' => $this->gallery]);
        }
        catch(ModelNotFoundException $e)
        {
            Session::flash('message-error', 'La galeria buscada no existe.');
            return Redirect::to('/galleries');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GalleryUpdateRequest $request, $id)
    {
        try
        {
            $this->gallery = Gallery::findOrFail($id);
            $this->gallery->fill($request->all());
            $this->gallery->save();
            Session::flash('message', 'Galería editada correctamente');
            return Redirect::to('/galleries');

        }
        catch(ModelNotFoundException $e)
        {
            Session::flash('message-error', 'La galería modificar no existe.');
            return Redirect::to('/galleries');
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
            $this->gallery = Gallery::findOrFail($id);
            $this->gallery->delete();
            Session::flash('message', 'Galería eliminada correctamente');
            return Redirect::to('/galleries');

        }
        catch(ModelNotFoundException $e)
        {
            Session::flash('message-error', 'La galería especificada no existe.');
            return Redirect::to('/galleries');
        }
    }
}
