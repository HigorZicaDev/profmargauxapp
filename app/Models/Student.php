<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'adresse',
        'city',
        'phone',
        'is_active',
        'date_birth',
    ];

    public function schedule()
    {
        return $this->hasMany(Schedule::class, 'student_id', 'id');
    }

    public function sales()
    {
        return $this->hasMany(Sales::class, 'student_id', 'id');
    }

}
