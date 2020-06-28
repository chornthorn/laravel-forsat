<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    public function detail()
    {
        return $this->hasOne(OpportunityDetail::class);
    }
}
