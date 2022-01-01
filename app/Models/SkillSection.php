<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillSection extends Model
{
    use HasFactory;

    /**
     * Get the skills associated
     * with this section
     */
    public function skills(){
       return $this->hasMany(Skill::class);
    }
}
