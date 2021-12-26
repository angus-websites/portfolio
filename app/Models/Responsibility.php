<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsibility extends Model
{
    use HasFactory;

    /**
     * Get the employment that owns the responsibilities.
     */
    public function employment()
    {
        return $this->belongsTo(Employment::class);
    }
}
