<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    protected $fillable = [
        'contact_id', 
        'account_id', 
        'job_title',
        'department',
        'status',
        'source',
        'source_description',
        'referred_by',
    ];
    
    public function salesReps()
    {
        return $this->belongsToMany(User::class, 'lead_user', 'lead_id', 'user_id');
    }

    public function pipelineStage()
    {
        return $this->belongsTo(PipelineStage::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
