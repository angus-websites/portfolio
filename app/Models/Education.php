<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    /**
     * Get the subjects for the education.
     */
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
