<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{
    use HasFactory;

    /**
     * Get the start date
     */
    public function getStartDateAttribute($value)
    {
        return date('Y',strtotime($value));
    }

    /**
     * Get the end date
     */
    public function getEndDateAttribute($value)
    {
        if ($value){
            return date('Y',strtotime($value));
        }

    }

    /**
     * Get the responsibilities for the employment.
     */
    public function responsibilities()
    {
        return $this->hasMany(Responsibility::class);
    }

    /**
     * Boolean - Does this employment
     * have responsibilities
     */
    public function hasResponsibilities(){
        return count($this->responsibilities()->get()) > 0;
    }

}
