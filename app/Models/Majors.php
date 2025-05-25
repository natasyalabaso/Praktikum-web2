<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Student;

class Majors extends Model
{
    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    protected $fillable = [
        'name',
        'code',
        'description',
    ];
}
