<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

//Models
use App\Models\User;
use App\Models\Role;

//Support
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
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
      User::truncate();
      DB::statement('SET FOREIGN_KEY_CHECKS=1');


      $superAdminRole=Role::where('name', '=', 'Super Admin')->firstOrFail();
      $adminRole = Role::where('name', '=', 'Admin')->firstOrFail();
      $proofRole = Role::where('name', '=', 'Proof Reader')->firstOrFail();

      if(config('admin.admin_name')) {
        $admin=User::create([
          'name' => config('admin.admin_name'),
          'email' => config('admin.admin_email'),
          'role_id' => $superAdminRole->id,
          'password' => (config('admin.admin_password')),
        ]);
      }

      // Create Bob the Admin
      $bob = User::create([
        'name' => 'Bob',
        'email' => 'bob@gmail.com',
        'role_id' => $adminRole->id,
        'password' => 'password123'
      ]);

      // Create Terry the Admin
      $terry = User::create([
        'name' => 'Terry',
        'email' => 'terry@gmail.com',
        'role_id' => $adminRole->id,
        'password' => 'password123'
      ]);


      // Create Charlie the Proof Reader
      $charlie = User::create([
        'name' => 'Charlie',
        'email' => 'charlie@gmail.com',
        'role_id' => $proofRole->id,
        'password' => 'password123'
      ]);
      
    }
}
