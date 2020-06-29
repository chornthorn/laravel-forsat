<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpportunityDetail extends Model
{
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime'
    ];
    protected $fillable =[
        'opportunity_id',
        'benefits',
        'application_process',
        'further_queries',
        'eligibilities',
        'start_date',
        'end_date',
        'official_link',
        'eligible_regions',
    ];
    public function opportunity()
    {
        return $this->belongsTo(Opportunity::class);
    }
}
