<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Education extends Model
{
    use HasFactory;
    public static $iconPath = "/images/education/icons/";

    public function setEndDateAttribute($date)
    {
      /**
       * Before we save the end date, check it's a valid
       * date, if not set to NULL
       */
        $this->attributes['end_date'] = $date ? $date : null; 
    }


    public function startYearHuman()
    {
        /**
         * Get the year this education
         * was started in a human readable
         * format
         */
        return date('Y',strtotime($this->start_date));
    }

    public function endYearHuman()
    {
        /**
         * Get the year this education
         * was started in a human readable
         * format
         */
        return $this->end_date ? date('Y',strtotime($this->end_date)) : "";
    }

    public function getIcon()
    {
        /**
         * Fetch the icon for this 
         * education
         */        
        if($this->icon){
          //Find this image in storage
          $path = $this::$iconPath.$this->icon;
          if(Storage::disk('public')->exists($path)){
            return asset($path);
          }
        }
    }


    public function removeIcon()
    {

      /**
       * Remove the image
       * associated with this education
       * from storage
       */
      if($this->icon){
        // Remove the file from storage
        $path = $this::$iconPath.$this->icon;
        if (Storage::disk('public')->delete($path)){
          $this->icon = null;
          $this->save();
        }
      }
      
    }

    public function replaceIcon($uploaded_image)
    {
      /**
       * Update the icon associated
       * with this education & remove the old one
       */
      $this->removeIcon();
      $imageName = uniqid().'.'.$uploaded_image->extension();    
      $uploaded_image->storePubliclyAs('public'.$this::$iconPath, $imageName);
      $this->icon = $imageName;
      $this->save();
    }


}
