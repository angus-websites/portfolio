<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Custom\ResourceManager;

class Project extends Model
{
    use HasFactory;
    
    //Statics
    public static $placeholder = "/assets/images/placeholders/project_placeholder.svg";
    public static $logo_placeholder = "/assets/images/placeholders/logo_placeholder.svg";
    public static $images_path = "/images/projects/";
    public static $logo_path = "/images/logos/";
    protected $fillable = ['name', 'category_id', 'short_desc','long_desc','git_link','web_link','date_made'];


    protected $casts = [
      'active' => 'boolean',
    ];

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
      // Delete the logo & images
      Skill::deleting(function($model) {
        $model->removeLogo();
        $model->removeImage();
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
     * Relationship to blocks
     */
    public function blocks(){
      return $this->belongsToMany(Block::class);
    }
    
    public function inProgress()
    {
      /**
       * Is the project currently in progess?
       */
      return is_null($this->date_made);
    }
   
    public function dateMadeHuman()
    {
      /**
       * Return the date created
       * in a standard format
       */
      return $this->inProgress() ? "In Progress" : date("M Y", strtotime($this->date_made)) ;
    }

    public function yearMade()
    {
      /**
       * Get the year this project was made
       */
      return $this->inProgress() ? "In Progress" : date("Y", strtotime($this->date_made));
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

    public function getImage()
    {
      /**
       * Fetch the image associated
       * with this project
       */
      
      return ResourceManager::getResource($this::$images_path, $this->img) ?? $this::$placeholder;
    }

    public function getLogo()
    {
      /**
       * Get the logo for this project
       */
      return ResourceManager::getResource($this::$logo_path, $this->logo) ?? $this::$logo_placeholder;
    }

    public function removeImage()
    {

      /**
       * Remove the image
       * associated with this project
       * from storage and set to default
       */
      ResourceManager::removeResource($this::$images_path, $this->img);
      $this->img = null;
      $this->save();
      
    }

    public function removeLogo()
    {

      /**
       * Remove the logo
       * associated with this project
       * from storage and set to default
       */
      ResourceManager::removeResource($this::$logo_path, $this->logo);
      $this->logo = null;
      $this->save();
      
    }

    public function replaceImage($uploaded_image)
    {
      /**
       * Update the iamge associated
       * with this project & remove the old one
       */
      $this->removeImage();
      $image_name = ResourceManager::uploadResource($uploaded_image, $this::$images_path);
      $this->img = $image_name;
      $this->save();
    }


    public function replaceLogo($uploaded_logo)
    {
      /**
       * Update the logo associated
       * with this project & remove the old one
       */
      $this->removeLogo();
      $image_name = ResourceManager::uploadResource($uploaded_logo, $this::$logo_path);
      $this->logo = $image_name;
      $this->save();
    }
    
}
