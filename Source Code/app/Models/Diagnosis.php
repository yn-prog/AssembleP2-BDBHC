<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Diagnosis extends Model
{
    protected $fillable = ['diagnosis_name', 'visible_to_roles'];

    protected $casts = [
        'visible_to_roles' => 'array', // ensures JSON cast
    ];

    public function records(): BelongsToMany
    {
        return $this->belongsToMany(HealthRecord::class, 'health_records_medical_diagnoses', 'diagnosis_id', 'health_record_id');
    }
}
