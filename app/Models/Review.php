<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id',
        'name',
        'email', 
        'message',
        'approved',
    ];
    
    // Define the relationship between Review and Business models
    public function business()
    {
        return $this->belongsTo(Business::class);
    }

}
