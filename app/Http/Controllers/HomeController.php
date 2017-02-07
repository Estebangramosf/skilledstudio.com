<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Post;
use App\Multimedia;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $posts;
    private $multimedias;
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->posts = Post::orderBy('created_at', 'desc')->limit(8)->get();
        $this->multimedias = Multimedia::orderBy('created_at', 'desc')->limit(4)->get();
        return view('welcome', ['posts'=>$this->posts, 'multimedias'=>$this->multimedias]);
    }
    public function test(){
        return view('layouts.test');
    }
}
