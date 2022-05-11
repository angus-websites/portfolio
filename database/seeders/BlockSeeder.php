<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

//Models
use App\Models\Block;
use App\Models\Project;

class BlockSeeder extends Seeder
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
        Block::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        //Redwood block
        $tam=Block::create([
            'path' => "redwood.tamworth",
            'name'=> 'Tamworth born business',
        ]);

        $redwood=Project::where("slug","=","redwood")->firstOrFail();
        $redwood->blocks()->sync([$tam->id => ["order"=>0]]);
    }
}
