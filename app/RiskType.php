<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiskType extends Model
{

    protected $table = 'risktypes';

    protected $fillable = ['name'];
}
