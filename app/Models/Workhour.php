<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Workhour extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id',
        'monday_start_time',
        'monday_end_time',
        'tuesday_start_time',
        'tuesday_end_time',
        'wednesday_start_time',
        'wednesday_end_time',
        'thursday_start_time',
        'thursday_end_time',
        'friday_start_time',
        'friday_end_time',
        'saturday_start_time',
        'saturday_end_time',
        'sunday_start_time',
        'sunday_end_time',
    ];

    // Define the relationship between Workhour and Business models
    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
