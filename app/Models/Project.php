<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Project extends Model
{
    use HasFactory;
    
    //Statics
    public static $placeholder = "/assets/images/placeholders/project_placeholder.svg";
    public static $logo_placeholder = "/assets/images/placeholders/logo_placeholder.svg";
    public static $imagesPath = "/images/projects/";
    public static $logoPath = "/images/logos/";
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
     * Return the date created
     * in a standard format
     */
    public function dateMadeHuman(){
      return date("d/m/Y", strtotime($this->date_made));
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
     * Get the image for this project
     */
    public function getImage()
    {
      /**
       * Fetch the image associated
       * with this project
       */
      
      if($this->img){
        //Find this image in storage
        $path = $this::$imagesPath.$this->img;
        if(Storage::disk('public')->exists($path)){
          return asset($path);
        }
      }
      //No image, return a placeholder
      return $this::$placeholder;

    }

    public function removeImage()
    {

      /**
       * Remove the image
       * associated with this project
       * from storage and set to default
       */
      if($this->img){
        // Remove the file from storage
        $path = $this::$imagesPath.$this->img;
        if (Storage::disk('public')->delete($path)){
          $this->img = null;
          $this->save();
        }
      }
      
    }

    public function replaceImage($uploaded_image)
    {
      /**
       * Update the iamge associated
       * with this project & remove the old one
       */
      $this->removeImage();
      $imageName = uniqid().'.'.$uploaded_image->extension();    
      $uploaded_image->storePubliclyAs('public'.$this::$imagesPath, $imageName);
      $this->img = $imageName;
      $this->save();
    }


    public function removeLogo()
    {
      /**
       * Remove the logo
       * associated with this project
       * from storage and set to default
       */
      P
      
    }

    public function replaceLogo($uploaded_logo)
    {
      /**
       * Update the logo associated
       * with this project & remove the old one
       */
      $this->removeLogo();
      $imageName = uniqid().'.'.$uploaded_logo->extension();    
      $uploaded_logo->storePubliclyAs('public'.$this::$logoPath, $imageName);
      $this->logo = $imageName;
      $this->save();
    }


    /**
     * Get the logo for this project
     */
    public function getLogo()
    {
      if($this->logo){
        //Find this image in storage
        $path = $this::$logoPath.$this->logo;
        if(Storage::disk('public')->exists($path)){
          return asset($path);
        }
      }
      //No image, return a placeholder
      return $this::$logo_placeholder;
    }
}
