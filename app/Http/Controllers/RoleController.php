<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\roles\RoleCreateRequest;
Use App\Role;
Use Session;
use Redirect;

class RoleController extends Controller
{

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
      $this->middleware('role', ['only' => [
        //'show',
      ]]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('roles.index', ['roles'=>Role::all()]); //change for class
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleCreateRequest $request)
    {
      Role::create($request->all());
      Session::flash('message', 'Rol creado correctamente');
      return Redirect::to('/roles/create');
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
            $role = Role::findOrFail($id);
            //dd($role);
        } // catch(Exception $e) catch any exception
        catch(ModelNotFoundException $e)
        {
            Session::flash('message-error', 'El rol buscado no existe.');
            return Redirect::to('/roles');
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
            $role = Role::findOrFail($id);
            dd($role);
        } // catch(Exception $e) catch any exception
        catch(ModelNotFoundException $e)
        {
            Session::flash('message-error', 'El rol buscado no existe.');
            return Redirect::to('/roles');
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
