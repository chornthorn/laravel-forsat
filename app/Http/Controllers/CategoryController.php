<?php

namespace App\Http\Controllers;

use App\Http\Resources\Lookups\CategoryCollection;
use App\Http\Resources\Lookups\Category as CategoryResource;
use App\Models\Lookups\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return CategoryCollection|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function index()
    {
//        return response(new CategoryCollection(Category::all()),200);
        return new CategoryCollection(Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return CategoryResource|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
           'name' => 'required|string|max:255'
        ]);
        if ($validator->fails()){
            return response(['errors'=> $validator->errors()],422);
        }
        $category = Category::create($request->all());

        return response(['status_message'=>'save successfully'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lookups\Category  $category
     * @return CategoryResource
     */
    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lookups\Category  $category
     * @return CategoryResource|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
        ]);
        if ($validator->fails()){
            return response(['errors'=> $validator->errors()],422);
        }

       $category->update($request->all());

        return response(['status_message'=>'Update successfully'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lookups\Category  $category
     * @return string
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response(['status_message'=>'Delete successfully'],200);
    }
}
