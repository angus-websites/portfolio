<?php

namespace App\Custom;

use Illuminate\Support\Facades\Storage;

class ResourceManager{

  public static function getResource($storage_folder, $resource_name)
  {
    /**
     * Attempt to find an image resource for the project  
     */
    if($resource_name){
      //Find this image in storage
      $path = $storage_folder.$resource_name;
      if(Storage::disk('public')->exists($path)){
        return asset($path);
      }
    }
  }

  public static function removeResource($storage_folder, $resource_name)
  {
    /**
     * Remove a resource
     */
    if ($resource_name){
      $path = $storage_folder.$resource_name;
      return Storage::disk('public')->delete($path);
    }  
  }

  public static function uploadResource($resource, $storage_folder)
  {
    /**
     * Upload a resource to the correct
     * file location
     */
    $resource_name = uniqid().'.'.$resource->extension();    
    $resource->storePubliclyAs('public'.$storage_folder, $resource_name);
    return $resource_name;
    
  }

}



