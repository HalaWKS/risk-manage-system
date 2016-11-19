<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanContent extends Model
{
    protected $table = 'plancontent';

    protected $fillable = ['r_id', 'plan_id'];
}