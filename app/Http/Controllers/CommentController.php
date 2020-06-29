<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentCollection;
use App\Http\Resources\Comment as CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return CommentCollection
     */
    public function index()
    {
        return new CommentCollection(Comment::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return CommentResource
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'comment' => 'required|string|max:500',
            'questionId' => 'required|numeric',
            'createdBy' => 'required|numeric'
        ]);

        if ($validator->fails()){
            return response(['errors'=>$validator->errors()],422);
        }

        $comment = Comment::create([
            'comment' => $request->comment,
            'question_id' => $request->questionId,
            'created_by' => $request->createdBy,
        ]);

        return new CommentResource($comment);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return CommentResource
     */
    public function show(Comment $comment)
    {
        return new CommentResource($comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return CommentResource
     */
    public function update(Request $request, Comment $comment)
    {
        $validator = Validator::make($request->all(),[
            'comment' => 'required|string|max:500',
            'questionId' => 'required|numeric',
            'createdBy' => 'required|numeric'
        ]);

        if ($validator->fails()){
            return response(['errors'=>$validator->errors()],422);
        }

        $comment->update([
            'comment' => $request->comment,
            'question_id' => $request->questionId,
            'created_by' => $request->createdBy,
        ]);

        return new CommentResource($comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
    }
}
