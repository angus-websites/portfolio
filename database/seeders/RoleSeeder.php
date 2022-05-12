<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

//Models
use App\Models\Role;

//Support
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
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
      Role::truncate();
      DB::statement('SET FOREIGN_KEY_CHECKS=1');

      //Roles
      Role::create([
        'name' => "Super Admin",
        'code' => "Sam",
        'description' => "The Goat",
        'changeable' => 0,
      ]);
      
      Role::create([
        'name' => "Admin",
        'code' => "Am",
        'description' => "As an admin you have full control of the application",
      ]);

      Role::create([
        'name' => "Proof Reader",
        'code' => "Pr",
        'description' => "As a proof reader you can view content not yet visible to the public and check for errors",
      ]);

      Role::create([
        'name' => "User",
        'code' => "Usr",
        'description' => "Currently, users cannot do much, lol",
      ]);
    }
}
