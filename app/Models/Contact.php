<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory; 

    protected $fillable = ['name', 'email', 'phone'];

    public function opportunities()
    {
        return $this->hasMany(Opportunity::class);
    }

    public function interactions()
    {
        return $this->hasMany(Interaction::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
    
}
