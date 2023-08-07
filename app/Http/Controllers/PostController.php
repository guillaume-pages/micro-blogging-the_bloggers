<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        // Post::latest()->get();
        return response()->json(['posts' =>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
        

        //On valide les données récupérés du formulaire
        $validation = $request-> validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'tag'=> 'required|string',
            // 'image' =>'required|image|mimes:jpeg,jpg,png,gif|max:2048',
        ]);
        
       
        $post = Post::create($validation);
        return response()->json(['post' => $post], 200);
        }
        
        catch (ValidationException $e){
            return response()->json(['error' => $e->errors()], 400);
        }

    }
       
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}