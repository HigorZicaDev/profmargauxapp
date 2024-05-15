<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'title',
        'price',
        'payday',
        'currency'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

}
