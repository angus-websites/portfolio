<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

//Models
use App\Models\Category;

//Support
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
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
      Category::truncate();
      DB::statement('SET FOREIGN_KEY_CHECKS=1');

      //Websites
      Category::create([
          'name' => "Websites",
          'short_name' => "Web",
          'slug'=> Str::slug('web', '-'),
      ]);

      //Mobile
      Category::create([
          'name' => "Mobile Apps",
          'short_name' => "Mobile",
          'slug'=> Str::slug('mobile', '-'),
      ]);

      //Desktop
      Category::create([
          'name' => "Desktop Applications",
          'short_name' => "Desktop",
          'slug'=> Str::slug('desktop', '-'),
      ]);
    }
}
