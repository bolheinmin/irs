<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversitySupervisor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'position',
        'university_id',
        'address'
    ];

    public function university()
    {
        return $this->belongsTo(University::class);
    }
}
