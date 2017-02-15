<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $user;
    public function __construct(){

    }

    public function index(){
        try{
            if($this->user = Auth::user()){
                if($this->user->role=='admin'){
                    return view('users.index', ['users'=>User::all()]);
                }else{
                    Session::flash('message-error', 'Usted no tiene privilegios para acceder a esta sección.');
                    return Redirect::to('/posts');
                }
            }else{
                Session::flash('message-error', 'Usted no tiene privilegios para acceder a esta sección.');
                return Redirect::to('/posts');
            }
        }catch(Exception $e){
            return Redirect::to('/posts');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('users.show', ['user'=>Auth::user()]);
    }
    public function profile(){
        return $this->show(Auth::user()->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            if($this->user = Auth::user()){
                if($this->user->role=='admin'){

                    $this->user = User::findOrFail($id);
                    return view('users.edit', ['user' => $this->user]);

                }else{
                    Session::flash('message-error', 'Usted no tiene privilegios para acceder a esta sección.');
                    return Redirect::to('/posts');
                }
            }else{
                Session::flash('message-error', 'Usted no tiene privilegios para acceder a esta sección.');
                return Redirect::to('/posts');
            }
        }catch(Exception $e){
            return Redirect::to('/posts');
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
        try
        {

            if($this->user = Auth::user()){
                if($this->user->role=='admin'){

                    $this->user = User::findOrFail($id);
                    $this->user->fill($request->all());
                    $this->user->save();
                    Session::flash('message', 'Usuario editado correctamente');
                    return Redirect::to('/users');

                }else{
                    Session::flash('message-error', 'Usted no tiene privilegios para acceder a esta sección.');
                    return Redirect::to('/posts');
                }
            }else{
                Session::flash('message-error', 'Usted no tiene privilegios para acceder a esta sección.');
                return Redirect::to('/posts');
            }
        } // catch(Exception $e) catch any exception
        catch(ModelNotFoundException $e)
        {
            Session::flash('message-error', 'El rol a modificar no existe.');
            return Redirect::to('/users');
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
        //
    }

    public function dashboard(){
        return view('users.dashboard');
    }
}
