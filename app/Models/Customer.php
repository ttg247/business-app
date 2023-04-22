<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'business_id',
    ];
    
    // Define the relationship between Customer and Business models
    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
