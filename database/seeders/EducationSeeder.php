<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

//Models
use App\Models\Education;

//Support
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;


class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear data
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Education::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // Polesworth
        Education::create([
            'institute' => "School Name",
            'level' => "GCSE",
            'start_date' => Carbon::parse('2011-01-09'),
            'end_date' => Carbon::parse('2016-01-07'),
            'description' => "Dunno mate"
        ]);

        // KEC
        Education::create([
            'institute' => "College Name",
            'level' => "A level",
            'start_date' => Carbon::parse('2016-01-09'),
            'end_date' => Carbon::parse('2018-01-07'),
            'description' => "College enit"
        ]);

        // Sheffield
        Education::create([
            'institute' => "University name",
            'level' => "Bsc Computer Science",
            'start_date' => Carbon::parse('2019-01-09'),
            'description' => "Seshfield mate"
        ]);
    }
}
