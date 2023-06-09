<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'description', 'amount'];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
