<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionCollection;
use App\Http\Resources\Question as QuestionResource;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return QuestionCollection
     */
    public function index()
    {
        return new QuestionCollection(Question::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return QuestionResource
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'question' => 'required|string|max:500',
            'createdBy' => 'required|numeric'
        ]);

        if ($validator->fails()){
            return response(['errors'=>$validator->errors()],422);
        }

        $question = Question::create([
            'question' => $request->question,
            'created_by' => $request->createdBy,
        ]);

        return new QuestionResource($question);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return QuestionResource
     */
    public function show(Question $question)
    {
        return new QuestionResource($question);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return QuestionResource
     */
    public function update(Request $request, Question $question)
    {
        $validator = Validator::make($request->all(),[
            'question' => 'required|string|max:500',
            'createdBy' => 'required|numeric'
        ]);

        if ($validator->fails()){
            return response(['errors'=>$validator->errors()],422);
        }

        $question->update([
            'question' => $request->question,
            'created_by' => $request->createdBy,
        ]);

        return new QuestionResource($question);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();
    }
}
