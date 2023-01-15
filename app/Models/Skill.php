<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Custom\ResourceManager;

class Skill extends Model
{
    use HasFactory;
    protected $fillable = ["name","skill_section_id","description","icon"];
    public static $iconsPath = "/images/skills/icons/";
    public static $placeholder = "/assets/images/placeholders/skill_placeholder.svg";


    protected static function boot()
    {
      /**
       * Delete the img
       * associated with
       * this skill when deleting
       * the skill itself
       */
      parent::boot();
      Skill::deleting(function($model) {
        $model->removeIcon();
      });
    }

    public function hasIcon(){
      if (ResourceManager::getResource($this::$iconsPath, $this->icon) ){
        return true;
      }
      return false;
    }

    /**
     * Get the icon for this Skill
     */
    public function getIcon(){
        return ResourceManager::getResource($this::$iconsPath, $this->icon) ?? $this::$placeholder;
    }

    public function removeIcon()
    {
        /**
         * Reset the icon
         * for this skill to the
         * default placeholder
         */
        
        ResourceManager::removeResource($this::$iconsPath, $this->icon);
        $this->icon = null;
        $this->save();

    }

    public function replaceIcon($uploaded_icon)
    {
      /**
       * Update the logo associated
       * with this project & remove the old one
       */
      $this->removeIcon();
      $image_name = ResourceManager::uploadResource($uploaded_icon, $this::$iconsPath);
      $this->icon = $image_name;
      $this->save();

    }


}
