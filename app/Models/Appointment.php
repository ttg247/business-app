<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    
    protected $fillable = ['start_time', 'end_time', 'description'];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
