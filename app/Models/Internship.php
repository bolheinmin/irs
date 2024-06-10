<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    use HasFactory;

    protected $fillable = [
        'intern_id',
        'company_id',
        'start_date',
        'end_date',
        'description'
    ];

    public function intern()
    {
        return $this->belongsTo(Intern::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function weeklyReports()
    {
        return $this->hasMany(WeeklyReport::class);
    }
}
