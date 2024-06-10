<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'internship_id',
        'week_no',
        'start_date',
        'end_date',
        'monday_report',
        'tuesday_report',
        'wednesday_report',
        'thursday_report',
        'friday_report',
        'reflection',
        'supervisor_comment',
        'signature',
        'status',
        'approved_date',
        'approved_by_company_supervisor'
    ];

    public function internship()
    {
        return $this->belongsTo(Internship::class);
    }

    public function approvedByCompanySupervisor()
    {
        return $this->belongsTo(CompanySupervisor::class, 'approved_by_company_supervisor');
    }
}
