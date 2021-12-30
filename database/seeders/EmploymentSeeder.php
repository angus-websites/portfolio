<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

//Models
use App\Models\Employment;
use App\Models\Responsibility;

//Support
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;


class EmploymentSeeder extends Seeder
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
        Employment::truncate();
        Responsibility::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // John Lewis
        $johnLewis = Employment::create([
            'employer' => "John Lewis",
            'role' => "Stock Management",
            'start_date' => Carbon::parse('2018-01-10'),
            'end_date' => Carbon::parse('2019-01-01'),
            'description' => "Worked at John Lewis bruv"
        ]);
        Responsibility::create([
            'employment_id' => $johnLewis->id,
            'content' => "Stacked boxes",
        ]);
        Responsibility::create([
            'employment_id' => $johnLewis->id,
            'content' => "Helped customers",
        ]);
        Responsibility::create([
            'employment_id' => $johnLewis->id,
            'content' => "Worked 'Click & Collect'",
        ]);

        // The Rose Inn
        $rose = Employment::create([
            'employer' => "The Rose Inn",
            'role' => "Waiter",
            'start_date' => Carbon::parse('2016-01-08'),
            'end_date' => Carbon::parse('2017-01-01'),
            'description' => "Worked at the Rose Inn"
        ]);
        Responsibility::create([
            'employment_id' => $rose->id,
            'content' => "Took food to people",
        ]);
        Responsibility::create([
            'employment_id' => $rose->id,
            'content' => "Made coffee",
        ]);
        Responsibility::create([
            'employment_id' => $rose->id,
            'content' => "Tidied tables n stuff",
        ]);

        // ONS
        $rose = Employment::create([
            'employer' => "Office For National Statistics",
            'role' => "Software Engineer",
            'start_date' => Carbon::parse('2021-01-10'),
        ]);
    }
}
