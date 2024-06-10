<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intern extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'university_id',
        'profile',
        'phone',
        'roll_no',
        'nrc_no',
        'date_of_birth',
        'gender',
        'education',
        'specialization',
        'class_project',
        'activity',
        'skill',
        'qualification',
        'address'
    ];

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function internship()
    {
        return $this->belongsTo(Internship::class);
    }
}
