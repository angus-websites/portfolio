<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected static function boot()
    {
      /**
       * Auto generate the slug
       * when creating the model
       */
      parent::boot();
      Category::creating(function($model) {
        $model->slug = Str::of($model->short_name)->slug('-');
      });

      
    }


    public function projects()
    {
        return $this->hasMany(Project::class);
    }

}
