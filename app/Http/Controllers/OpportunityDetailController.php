<?php

namespace App\Http\Controllers;

use App\Http\Resources\OpportunityDetailCollection;
use App\Models\OpportunityDetail;
use Illuminate\Http\Request;

class OpportunityDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return OpportunityDetailCollection
     */
    public function index()
    {
        return new OpportunityDetailCollection(OpportunityDetail::paginate(10));
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
     * @param  \App\Models\Lookups\OpportunityDetail  $opportunityDetail
     * @return \Illuminate\Http\Response
     */
    public function show(OpportunityDetail $opportunityDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lookups\OpportunityDetail  $opportunityDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OpportunityDetail $opportunityDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lookups\OpportunityDetail  $opportunityDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(OpportunityDetail $opportunityDetail)
    {
        //
    }
}
