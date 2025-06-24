<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warranty extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'branch_id',
        'description',
        'duration',
        'duration_type',
        'created_by',
        'status'
    ];

    public static function forDropdown($branch_id=null)
    {
        $warranties = Warranty::where('status', 1)->where('branch_id', $branch_id)->get();

        return $warranties->map(function ($warranty) {
            return (object)[
                'id' => $warranty->id,
                'name' => $warranty->name . ' (' . $warranty->duration . ' ' . __($warranty->duration_type) . ')',
            ];
        });
    }
}
