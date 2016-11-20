<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Http\Requests;
use App\Http\Requests\roles\RoleCreateRequest;
use App\Http\Requests\roles\RoleUpdateRequest;
Use App\Role;
Use Session;
use Redirect;

class RoleController extends Controller
{
    private $role;
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
            $this->role = Role::findOrFail($id);
            return view('roles.show', ['role'=>$this->role]);
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
            $this->role = Role::findOrFail($id);
            return view('roles.edit', ['role' => $this->role]);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleUpdateRequest $request, $id)
    {
        try
        {
            $this->role = Role::findOrFail($id);
            $this->role->fill($request->all());
            $this->role->save();
            Session::flash('message', 'Role editado correctamente');
            return Redirect::to('/roles');

        } // catch(Exception $e) catch any exception
        catch(ModelNotFoundException $e)
        {
            Session::flash('message-error', 'El rol a modificar no existe.');
            return Redirect::to('/roles');
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
            $this->role = Role::findOrFail($id);
            $this->role->delete();
            Session::flash('message', 'Role eliminado correctamente');
            return Redirect::to('/roles');

        } // catch(Exception $e) catch any exception
        catch(ModelNotFoundException $e)
        {
            Session::flash('message-error', 'El rol especificado no existe.');
            return Redirect::to('/roles');
            //dd($e->getMessage());
            //dd(get_class_methods($e)); // lists all available methods for exception object
            //dd($e);
        }
    }
}
