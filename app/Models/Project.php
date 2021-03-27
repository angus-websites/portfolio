<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    use HasFactory;
    public static $placeholder = "/assets/images/placeholders/project_placeholder.svg";
    public static $imagesPath = "projects/";

    /**
     * Define how routes should be
     * handled
     */
    public function getRouteKeyName()
    {
      return 'slug';
    }

    /**
     * This function will get the URL
     * for this project
     */
    public function get_url(){
      return "/projects/".$this->slug;
    }

    /**
     * Get the category this project belongs
     * to
     */
    public function get_category(){
        return "";
    }

    /**
     * Get the image for this project
     */
    public function get_image(){
      if($this->img){
        //Find this logo in storage
        $path = "images/".$this::$imagesPath.$this->img;
        if(Storage::disk('public')->exists($path)){
          return asset($path);
        }else{
          return $this::$placeholder;
        }
      }
      //No image, return a placeholder
      else{
        return $this::$placeholder;
      }

    }
}
