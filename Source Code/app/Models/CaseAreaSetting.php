<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseAreaSetting extends Model
{
    protected $fillable = ['type', 'min_cases', 'max_cases'];
}
