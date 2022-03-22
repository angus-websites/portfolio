<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;
    
    //Statics
    public static $placeholder = "/assets/images/placeholders/project_placeholder.svg";
    public static $logo_placeholder = "/assets/images/placeholders/logo_placeholder.svg";
    public static $imagesPath = "projects/";
    public static $logoPath = "logos/";
    protected $fillable = ['name', 'category_id', 'short_desc','long_desc','git_link','web_link','date_made'];


    protected static function boot()
    {
      /**
       * Auto generate the slug
       * when creating the model
       */
      parent::boot();
      Project::creating(function($model) {
        $model->slug = Str::of($model->name)->slug('-');
      });
    }

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
     * Remove the image
     * for this project
     */
    public function removeImage(){

      if($this->img){
        // Remove the file from storage
        $path = "images/".$this::$imagesPath.$this->img;
        if (Storage::disk('public')->delete($path)){
          $this->img = null;
          $this->save();
        }
      }
      
    }

    public function removeLogo(){

      if($this->logo){
        // Remove the file from storage
        $path = "images/".$this::$logoPath.$this->logo;
        Storage::disk('public')->delete($path);
        $this->logo = null;
        $this->save();
      }
      
    }

    public function replaceLogo($uploaded_logo)
    {

      $this->removeLogo();
      $imageName = uniqid().'.'.$uploaded_logo->extension();    
      $uploaded_logo->storePubliclyAs('public/images/logos', $imageName);
      $this->logo = $imageName;
      $this->save();
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
