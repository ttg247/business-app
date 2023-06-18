<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    
    public function salesReps()
    {
        return $this->belongsToMany(User::class, 'lead_user', 'lead_id', 'user_id');
    }

    public function pipelineStage()
    {
        return $this->belongsTo(PipelineStage::class);
    }


}
