<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Custom\ResourceManager;

class Employment extends Model
{
    use HasFactory;
    public static $iconPath = "/images/employment/icons/";

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
         * Get the year this employment
         * was started in a human readable
         * format
         */
        return date('Y',strtotime($this->start_date));
    }

    public function endYearHuman()
    {
        /**
         * Get the year this employment
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
        return ResourceManager::getResource($this::$iconPath, $this->icon);
    }


    public function removeIcon()
    {

      /**
       * Remove the image
       * associated with this education
       * from storage
       */

      ResourceManager::removeResource($this::$iconPath, $this->icon);
      $this->icon = null;
      $this->save();
      
    }

    public function replaceIcon($uploaded_image)
    {
      /**
       * Update the icon associated
       * with this education & remove the old one
       */
      $this->removeIcon();
      $image_name = ResourceManager::uploadResource($uploaded_image, $this::$iconPath);
      $this->icon = $image_name;
      $this->save();
    }


}
