<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Risk extends Model
{
    protected $fillable = ['p_id', 'type_id', 'creator_id', 'tracker_id', 'content', 'possibility', 'effect', 'trigger'];
}