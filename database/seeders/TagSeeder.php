<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

//Models
use App\Models\Tag;

//Support
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      //Clear data
      DB::statement('SET FOREIGN_KEY_CHECKS=0');
      Tag::truncate();
      DB::statement('SET FOREIGN_KEY_CHECKS=1');


      //Web
      Tag::create([
          'name' => "Web",
      ]);

      //PHP
      Tag::create([
        'name' => "PHP",
        'colour' => "#A5B4FB",
        'text_colour' => "#6364af"
      ]);

      //Bootstrap
      Tag::create([
        'name' => "Bootstrap",
        'colour' => "#8113F4",
        'text_colour' => "#FFFFFF"
      ]);


      //Bulma
      Tag::create([
        'name' => "Bulma",
        'colour' => "#00C7A9",
        'text_colour' => "#116652"
      ]);

      //Python
      Tag::create([
         'name' => "Python",
         'colour' => "#FECE3A",
         'text_colour' => "#8E7935"
      ]);

      //Javascript
      Tag::create([
         'name' => "Javascript",
         'colour' => "#EFDC4F",
         'text_colour' => "#000000"
      ]);

      //Jquery
      Tag::create([
         'name' => "jQuery",
         'colour' => "#0268AD",
         'text_colour' => "#FFFFFF"
      ]);

    }
}
