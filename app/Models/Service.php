<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id', 
        'title', 
        'description', 
        'price',
    ];
    
    // Define the relationship between Service and Business models
    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
