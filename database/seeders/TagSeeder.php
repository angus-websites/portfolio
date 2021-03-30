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
        'colour' => "indigo-300",
        'text_colour' => "indigo-600"
      ]);

      //Bootstrap
      Tag::create([
        'name' => "Bootstrap",
        'colour' => "indigo-500",
        'text_colour' => "white"
      ]);


      //Bulma
      Tag::create([
        'name' => "Bulma",
        'colour' => "green-300",
        'text_colour' => "green-600"
      ]);

      //Python
      Tag::create([
         'name' => "Python",
         'colour' => "yellow-400",
         'text_colour' => "yellow-700"
      ]);

      //Javascript
      Tag::create([
         'name' => "Javascript",
         'colour' => "yellow-400",
         'text_colour' => "yellow-700"
      ]);

      //Jquery
      Tag::create([
         'name' => "jQuery",
         'colour' => "blue-500",
         'text_colour' => "white"
      ]);

    }
}
