<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

//Models
use App\Models\Project;

//Support
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;


class ProjectSeeder extends Seeder
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
      Project::truncate();
      DB::statement('SET FOREIGN_KEY_CHECKS=1');

      //Redwood
      Project::create([
          'name' => "Redwood",
          'slug'=> Str::slug('redwood', '-'),
          'short_desc' => "A website for a small marketing company",
          'long_desc' => "A long description describing the Redwood website would go here",
          'web_link' => "https://www.redwood.business",
          'date_made' => Carbon::parse('2021-03-03'),
          'img' => "redwood.jpg",
      ]);

      //Passworld
      Project::create([
          'name' => "Passworld",
          'slug'=> Str::slug('passworld', '-'),
          'short_desc' => "A website for a generating and learning about passwords",
          'long_desc' => "A long description describing the Passworld website would go here",
          'web_link' => "https://www.passworld.co.uk",
          'date_made' => Carbon::parse('2021-08-01'),
          'img' => "passworld.jpg",
      ]);
    }
}
