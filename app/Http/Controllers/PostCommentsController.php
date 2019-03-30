<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Comment;

class PostCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();
        return view('admin.comments.index',compact('comments'));
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
    public function store(Request $request)
    {
        
    
     if (!Auth::check()) { 
         
        $request->session()->flash('login', 'You must be logged in to post a comment');
        return redirect()->back();
    }    
      if(Auth::check()){
    $user = Auth::user();
    $data = [

        'post_id'=>$request->post_id,
         'author'=>$user->name,
         'email'=>$user->email,
         'body'=>$request->body

        ];

    Comment::create($data); 
    $request->session()->flash('comment_success','Your comment have been submited and is waiting moderation');
    return redirect()->back();
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
        $comment = Comment::findOrFail($id);
        Comment::findOrFail($id)->update($request->all());
        if($comment->is_active == 1){
          Session::flash('unapprove','The comment has been unapproved'); 
          return redirect()->back();
        }else{
        Session::flash('approve','The comment has been approved'); 
          return redirect()->back();
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
        Comment::findOrFail($id)->delete();
        Session::flash('deleted_comment','The comment has been deleted');
        return redirect()->back();
    }
}
