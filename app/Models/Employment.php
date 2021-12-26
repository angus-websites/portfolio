<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{
    use HasFactory;

    /**
     * Get the responsibilities for the employment.
     */
    public function responsibilities()
    {
        return $this->hasMany(Responsibility::class);
    }

}