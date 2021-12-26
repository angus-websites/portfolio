<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
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
     * Boolean - Does this education
     * have subjects
     */
    public function hasSubjects(){
        return count($this->subjects()->get()) > 0;
    }


    /**
     * Get the subjects for the education.
     */
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }


}
