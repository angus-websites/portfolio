<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillSection extends Model
{
    use HasFactory;
    protected $fillable = ["name"];

    protected static function boot()
    {
      /**
       * Ensure child skills
       * are deleted with a cleanup
       * when the section is deleted
       */
      parent::boot();
      SkillSection::deleting(function($model) {
         $model->skills()->get()->each(function ($skill) {
               $skill->delete();
         });
      });
    }

    /**
     * Get the skills associated
     * with this section
     */
    public function skills(){
       return $this->hasMany(Skill::class);
    }
}
