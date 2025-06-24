<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'units';

    protected $fillable = [
        'branch_id','name','short_name','allow_decimal','base_unit_id','base_unit_multiplier','status','user_id'
    ];

}
