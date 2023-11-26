<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return PostResource::collection(Post::all());

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title'=>'required',
            'body'=>'required',
        ]);

        if ($validator->fails()){
            return response()->json([
                'status'=>422,
                'error'=>$validator->messages(),
            ],422);
        }

        $post=new Post();
        $post->title=$request->title;
        $post->body=$request->body;
        if ($post->save()){
            return response()->json([
                'status'=>200,
                'message'=>"Post created successfully",
            ]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $post=Post::find($id);

        return response()->json([
            'status'=>200,
            'post'=>$post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'title'=>'required|min:4',
            'body'=>'required',
        ]);

        if ($validator->fails()){
            return response()->json([
                'status'=>422,
                'error'=>$validator->messages(),
            ],422);
        }

        $post=Post::find($id);
        $post->title=$request->title;
        $post->body=$request->body;
        if ($post->save()){
            return response()->json([
                'status'=>200,
                'success'=>"Post Updated successfully",
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        if ($post->delete()){
            return response()->json([
                'success'=>"Post deleted successfully",
            ]);
        }
    }
}
