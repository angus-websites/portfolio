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
        'changeable' => 0,
      ]);
      
      Role::create([
        'name' => "Admin",
      ]);
      Role::create([
        'name' => "User",
      ]);
      Role::create([
        'name' => "Client",
      ]);
    }
}
