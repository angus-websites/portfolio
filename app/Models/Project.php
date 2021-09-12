<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    use HasFactory;
    
    //Statics
    public static $placeholder = "/assets/images/placeholders/project_placeholder.svg";
    public static $logo_placeholder = "/assets/images/placeholders/logo_placeholder.svg";
    public static $imagesPath = "projects/";
    public static $logoPath = "logos/";
    protected $fillable = ['name','short_desc','long_desc','git_link','web_link','date_made'];

    /**
     * Define how routes should be
     * handled
     */
    public function getRouteKeyName()
    {
      return 'slug';
    }

    /**
     * Fetch all the tags for a project
     */
    public function tags() {
        return $this->belongsToMany(Tag::class, 'project_tags');
    }

    /**
     * This function will get the URL
     * for this project
     */
    public function get_url(){
      return "/projects/".$this->slug;
    }

    /**
     * Get the url to edit
     * this project
     */
    public function get_edit_url(){
      return $this->get_url()."/edit";
    }


    /**
     * Get the category this project belongs
     * to
     */
    public function category(){
      return $this->belongsTo(Category::class)->first();
    }

    /**
     * Return the date created
     * in a standard format
     */
    public function get_date_created(){
      return date("d/m/Y", strtotime($this->date_made));
    }

    /**
     * Get the image for this project
     */
    public function get_image(){
      if($this->img){
        //Find this image in storage
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

    /**
     * Does this project have a logo
     * stored?
     * @return boolean
     */
    public function has_logo(){
      if($this->logo){
        return 1;
      }
      return 0;
    }

    /**
     * Get the logo for this project
     */
    public function get_logo(){
      if($this->logo){
        //Find this image in storage
        $path = "images/".$this::$logoPath.$this->logo;
        if(Storage::disk('public')->exists($path)){
          return asset($path);
        }else{
          return $this::$logo_placeholder;
        }
      }
      //No image, return a placeholder
      else{
        return $this::$logo_placeholder;
      }
    }
}
