<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Account extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'summary', 
        'details', 
        'email', 
        'phone', 
        'address',
        'facebook', 
        'twitter', 
        'instagram', 
        'users_id',
        'invite_link',
        'website',
        'type',
        'revenue',
        'member_of',
        'campaign',
        'industry',
        'employees'
    ];

    // Defines the relationship between the Accounts and User models
    public function user():BelongsTo    
    {
        return $this->belongsTo(User::class);
    }
    
    // Defines the relationship between the Accounts and User models
    public function address():BelongsTo    
    {
        return $this->belongsTo(Address::class);
    }
}
