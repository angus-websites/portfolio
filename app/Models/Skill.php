<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Skill extends Model
{
    use HasFactory;
    protected $fillable = ["name","skill_section_id","description","icon"];
    public static $imagesPath = "skills/";
    public static $placeholder = "/assets/images/placeholders/skill_placeholder.svg";


    /**
     * Get the image for this project
     */
    public function getImage(){
        if($this->icon){
            //Find this image in storage
            $path = "images/".$this::$imagesPath.$this->icon;
            if(Storage::disk('public')->exists($path)){
                return asset($path);
            }
            else{
                $public_path = 'assets/images/skill_icons/' . $this->icon;
                //Check for a public version
                if (file_exists(public_path($public_path))){
                    return asset($public_path);
                }
                //Return placeholder
                else{
                    return $this::$placeholder;
                }

            }
        }
        //No image, return a placeholder
        else{
            return $this::$placeholder;
        }

    }


}
