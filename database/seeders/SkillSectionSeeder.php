<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

//Models
use App\Models\SkillSection;

//Support
use Illuminate\Support\Facades\DB;


class SkillSectionSeeder extends Seeder
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
        SkillSection::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        //Skill sections
        SkillSection::create(['name' => "Front end"]);
        SkillSection::create(['name' => "Back end"]);
        SkillSection::create(['name' => "Design"]);
        SkillSection::create(['name' => "Frameworks"]);
    }
}
