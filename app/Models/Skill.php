<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
    

    /**
     * Get the icon for this Skill
     */
    public function getIcon(){
        if($this->icon){
            //Find this image in storage
            $path = $this::$iconsPath.$this->icon;
            if(Storage::disk('public')->exists($path)){
                return asset($path);
            }
        }
        return $this::$placeholder;
    }

    public function removeIcon()
    {
        /**
         * Reset the icon
         * for this skill to the
         * default placeholder
         */
        
        if($this->icon){
          // Remove the file from storage
          $path = $this::$iconsPath.$this->icon;
          if (Storage::disk('public')->delete($path)){
            $this->icon = null;
            $this->save();
          }
        }

    }

    public function replaceIcon($uploaded_icon)
    {
      /**
       * Update the logo associated
       * with this project & remove the old one
       */
      $this->removeIcon();
      $iconName = uniqid().'.'.$uploaded_icon->extension();    
      $uploaded_icon->storePubliclyAs('public'.$this::$iconsPath, $iconName);
      $this->icon = $iconName;
      $this->save();
    }


}
