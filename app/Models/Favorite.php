<?php

namespace App\Models;

use App\User;
use App\Models\Opportunity;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = ['id','user_id','opportunity_id'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function opportunity()
    {
        return $this->belongsTo(Opportunity::class,'opportunity_id');
    }
}
