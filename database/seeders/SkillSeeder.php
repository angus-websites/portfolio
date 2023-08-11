<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

//Models
use App\Models\Skill;
use App\Models\SkillSection;

//Support
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Clear data
        Schema::disableForeignKeyConstraints();
        Skill::query()->delete();
        Schema::enableForeignKeyConstraints();

        //Get skill sections
        $front_end=SkillSection::where('name', '=', 'Front end')->firstOrFail();
        $back_end=SkillSection::where('name', '=', 'Back end')->firstOrFail();
        $frameworks=SkillSection::where('name', '=', 'Frameworks')->firstOrFail();
        $devops=SkillSection::where('name', '=', 'DevOps')->firstOrFail();


        //Generate some skills
        Skill::create(['skill_section_id' => $front_end->id, "Name" => "Javascript"]);
        Skill::create(['skill_section_id' => $front_end->id, "Name" => "HTML"]);
        Skill::create(['skill_section_id' => $front_end->id, "Name" => "CSS"]);

        Skill::create(['skill_section_id' => $back_end->id, "Name" => "PHP"]);
        Skill::create(['skill_section_id' => $back_end->id, "Name" => "MYSQL"]);
        Skill::create(['skill_section_id' => $back_end->id, "Name" => "Python"]);
        Skill::create(['skill_section_id' => $back_end->id, "Name" => "Java"]);
        Skill::create(['skill_section_id' => $back_end->id, "Name" => "Ruby"]);


        Skill::create(['skill_section_id' => $frameworks->id, "Name" => "Laravel"]);
        Skill::create(['skill_section_id' => $frameworks->id, "Name" => "Rails"]);
        Skill::create(['skill_section_id' => $frameworks->id, "Name" => "Django"]);

        Skill::create(['skill_section_id' => $devops->id, "Name" => "Git"]);
        Skill::create(['skill_section_id' => $devops->id, "Name" => "Docker"]);
        Skill::create(['skill_section_id' => $devops->id, "Name" => "Jenkins"]);
        Skill::create(['skill_section_id' => $devops->id, "Name" => "GCP"]);

    }
}
