<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'health_record_id',
        'user_id',
        'consultation_date',
        'visit_purpose',
        'medical_diagnosis',
        'given_medicine',
        'status',
    ];

    public function healthRecord()
    {
        return $this->belongsTo(HealthRecord::class);
    }
   public function user()
{
    return $this->belongsTo(User::class);
}


}

