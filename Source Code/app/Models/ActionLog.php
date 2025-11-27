<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ActionLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'patient_id',
        'action_type',
        'details',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function patient()
    {
        return $this->belongsTo(HealthRecord::class, 'patient_id')->withTrashed();
    }

    public function getPatientNameAttribute()
    {
        if ($this->patient) {
            return $this->patient->first_name . ' ' . $this->patient->last_name;
        }
        return 'System Action'; // For actions not related to specific patients
    }
}
