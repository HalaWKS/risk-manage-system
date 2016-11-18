<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiskUpdate extends Model
{
    protected $table = 'riskupdate';

    protected $fillable = ['r_id', 'u_id', 'content'];
}
