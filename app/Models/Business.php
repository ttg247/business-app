<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Business extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'summary', 
        'details', 
        'email', 
        'phone', 
        'facebook', 
        'twitter', 
        'instagram', 
        'users_id',
    ];

    // Defines the relationship between the Business and User models
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
