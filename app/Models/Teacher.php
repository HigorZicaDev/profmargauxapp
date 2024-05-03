<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'adresse',
        'city',
        'phone',
        'status',
        'date_birth'
    ];

    public function schedule()
    {
        return $this->hasMany(Schedule::class, 'teacher_id', 'id');
    }
    
}
