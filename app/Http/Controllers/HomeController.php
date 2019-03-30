<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(2);
        $categories = Category::all();
        return view('home',compact('posts','categories'));
    }
    
    public function search(){
        $keyword = Input::get('keyword', '');
        $posts = Post::SearchByKeyword($keyword)->get();
        $categories = Category::all();
        return view('welcome',compact('posts','categories'));
    }
    
     public function getCategory($category_id)
    {
        $categories = Category::all();
        $category = Category::find($category_id);
        if($category !== null){
            $posts = $category->posts;
            return view('category',compact('posts','categories'));
        }
    }
}
