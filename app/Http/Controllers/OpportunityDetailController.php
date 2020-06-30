<?php

namespace App\Http\Controllers;

use App\Http\Requests\OpportunityDetailRequest;
use App\Http\Resources\OpportunityDetailCollection;
use App\Http\Resources\OpportunityDetail as OpportunityDetailResource;
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
     * @return OpportunityDetailResource
     */
    public function store(OpportunityDetailRequest $request)
    {
        $opportunityDetail = OpportunityDetail::create([
            'opportunity_id' => $request->opportunityId,
            'benefits' => $request->benefits,
            'application_process' => $request->applicationProcess,
            'further_queries' => $request->furtherQueries,
            'eligibilities' => $request->eligibilities,
            'start_date' => $request->startDate,
            'end_date' => $request->endDate,
            'official_link' => $request->officialLink,
            //'eligible_regions' => $request->eligibleRegions,
        ]);

        return new OpportunityDetailResource($opportunityDetail);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lookups\OpportunityDetail  $opportunityDetail
     * @return OpportunityDetailResource
     */
    public function show(OpportunityDetail $opportunityDetail)
    {
        return new OpportunityDetailResource($opportunityDetail);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lookups\OpportunityDetail  $opportunityDetail
     * @return OpportunityDetailResource
     */
    public function update(OpportunityDetailRequest $request, OpportunityDetail $opportunityDetail)
    {
        $opportunityDetail = $opportunityDetail->update([
            'opportunity_id' => $request->opportunityId,
            'benefits' => $request->benefits,
            'application_process' => $request->applicationProcess,
            'further_queries' => $request->furtherQueries,
            'eligibilities' => $request->eligibilities,
            'start_date' => $request->startDate,
            'end_date' => $request->endDate,
            'official_link' => $request->officialLink,
            //'eligible_regions' => $request->eligibleRegions,
        ]);

        return new OpportunityDetailResource($opportunityDetail);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lookups\OpportunityDetail  $opportunityDetail
     * @return bool
     */
    public function destroy(OpportunityDetail $opportunityDetail)
    {
        return $opportunityDetail->delete();
    }
}
