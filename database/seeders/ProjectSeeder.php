<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

//Models
use App\Models\Project;
use App\Models\Tag;
use App\Models\Category;

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
      DB::table('project_tags')->truncate();
      DB::statement('SET FOREIGN_KEY_CHECKS=1');

      //Redwood
      $redwood=Project::create([
          'name' => "Redwood",
          'slug'=> Str::slug('redwood', '-'),
          'category_id' => Category::where('name', '=', 'Websites')->firstOrFail()->id,
          'short_desc' => "A website for a small marketing company",
          'long_desc' => "A long description describing the Redwood website would go here",
          'web_link' => "https://www.redwood.business",
          'date_made' => Carbon::parse('2021-03-03'),
          'img' => "redwood.jpg",
      ]);

      //Redwood Tags
      $data = [
          ['project_id'=> $redwood->id, 'tag_id'=> Tag::where('name', '=', 'Web')->firstOrFail()->id],
          ['project_id'=> $redwood->id, 'tag_id'=> Tag::where('name', '=', 'PHP')->firstOrFail()->id],
          ['project_id'=> $redwood->id, 'tag_id'=> Tag::where('name', '=', 'BOOTSTRAP')->firstOrFail()->id],
      ];
      DB::table('project_tags')->insert($data);


      //Passworld
      $passworld=Project::create([
          'name' => "Passworld",
          'slug'=> Str::slug('passworld', '-'),
          'category_id' => Category::where('name', '=', 'Websites')->firstOrFail()->id,
          'short_desc' => "A website for a generating and learning about passwords",
          'long_desc' => "A long description describing the Passworld website would go here",
          'web_link' => "https://www.passworld.co.uk",
          'date_made' => Carbon::parse('2021-08-01'),
          'img' => "passworld.jpg",
      ]);

      //Password Tags
      $data = [
          ['project_id'=> $passworld->id, 'tag_id'=> Tag::where('name', '=', 'Web')->firstOrFail()->id],
          ['project_id'=> $passworld->id, 'tag_id'=> Tag::where('name', '=', 'PHP')->firstOrFail()->id],
          ['project_id'=> $passworld->id, 'tag_id'=> Tag::where('name', '=', 'Bulma')->firstOrFail()->id],
          ['project_id'=> $passworld->id, 'tag_id'=> Tag::where('name', '=', 'jQuery')->firstOrFail()->id],

      ];
      DB::table('project_tags')->insert($data);
    }
}
