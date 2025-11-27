<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class HealthRecord extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = true;

    protected $fillable = [
        'first_name',
        'last_name',
        // 'age',
        // 'age_unit',
        'gender',
        'blood_type',
        'birth_date',
        'height',
        'weight',
        'contact_number',
        'philhealth_number',
        'street',
        'address',            
        'visit_purpose',
        'other_purpose',
        // 'medical_diagnosis',
        'other_diagnosis',
        'given_medicine',
        'date_consulted',
        'status',
    ];
    public function getAgeAttribute()
{
    return Carbon::parse($this->birth_date)->diffForHumans(null, true); // e.g., "6 months", "3 years"
}

public function diagnoses(): BelongsToMany
{
    return $this->belongsToMany(
        Diagnosis::class,
        'health_records_medical_diagnoses',
        'health_record_id',     // foreign key on pivot table pointing to health_records
        'diagnosis_id'          // foreign key on pivot table pointing to diagnoses
    );
}
public function historyRecords()
{
    return $this->hasMany(HistoryRecord::class);
}

}