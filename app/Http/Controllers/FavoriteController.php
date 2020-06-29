<?php

namespace App\Http\Controllers;

use App\Http\Requests\FavoriteRequest;
use App\Http\Resources\FavoriteCollection;
use App\Http\Resources\Favorite as FavoriteResource;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return FavoriteCollection
     */
    public function index()
    {
        return new FavoriteCollection(Favorite::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return FavoriteResource
     */
    public function store(FavoriteRequest $request)
    {
        $favorite = Favorite::create([
            'user_id' => $request->userId,
            'opportunity_id' => $request->opportunityId
        ]);

        return new FavoriteResource($favorite);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Favorite $favorite
     * @return FavoriteResource
     */
    public function show(Favorite $favorite)
    {
        return new FavoriteResource($favorite);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Favorite $favorite
     * @return FavoriteResource
     */
    public function update(FavoriteRequest $request, Favorite $favorite)
    {
        $favorite = $favorite->update([
            'user_id' => $request->userId,
            'opportunity_id' => $request->opportunityId,
        ]);

        return new FavoriteResource($favorite);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Favorite $favorite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Favorite $favorite)
    {
        $favorite->delete();
    }
}
