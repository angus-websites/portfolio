<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;
    public static $basePath = "blocks/";


    /**
     * Relationship
     * to projects
     */
    public function projects(){
      return $this->belongsToMany(Project::class);
    }

    public function getPath(){
      return $this::$basePath.$this->path;
    }
}
