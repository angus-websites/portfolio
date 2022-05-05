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
      DB::table('user_roles')->truncate();
      DB::statement('SET FOREIGN_KEY_CHECKS=1');


      $superAdminRole=Role::where('name', '=', 'Super Admin')->firstOrFail();
      $adminRole = Role::where('name', '=', 'Admin')->firstOrFail();
      $userRole = Role::where('name', '=', 'User')->firstOrFail();

      if(config('admin.admin_name')) {
        $admin=User::create([
          'name' => config('admin.admin_name'),
          'email' => config('admin.admin_email'),
          'password' => (config('admin.admin_password')),
        ]);

        DB::table('user_roles')->insert([
          'user_id' => $admin->id,
          'role_id' => $superAdminRole->id,
        ]);
      }

      // Create Bob the Admin
      $bob = User::create([
        'name' => 'Bob',
        'email' => 'bob@gmail.com',
        'password' => 'password123'
      ]);

      DB::table('user_roles')->insert([
        'user_id' => $bob->id,
        'role_id' => $adminRole->id,
      ]);

      // Create Terry the Admin
      $terry = User::create([
        'name' => 'Terry',
        'email' => 'terry@gmail.com',
        'password' => 'password123'
      ]);

      DB::table('user_roles')->insert([
        'user_id' => $terry->id,
        'role_id' => $adminRole->id,
      ]);

      // Create Charlie the User
      $charlie = User::create([
        'name' => 'Charlie',
        'email' => 'charlie@gmail.com',
        'password' => 'password123'
      ]);

      DB::table('user_roles')->insert([
        'user_id' => $charlie->id,
        'role_id' => $userRole->id,
      ]);


      
    }
}
