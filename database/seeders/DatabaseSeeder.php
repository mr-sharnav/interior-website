<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([

            'name' => 'Super Admin',
            'email' => 'super-admin@mail.com',
            'password' => Hash::make('12345678'),
            'created_at'=> Carbon::now(),

        ]);
        DB::table('users')->insert([

            'name' => 'Adminstrator',
            'email' => 'admin@mail.com',
            'password' => Hash::make('12345678'),
            'created_at'=> Carbon::now(),

        ]);
        DB::table('roles')->insert([

            'name' => 'super-admin',
            'guard_name' => 'web',
            'created_at'=> Carbon::now(),
           
                
        ]);
        DB::table('roles')->insert([

            'name' => 'admin',
            'guard_name' => 'web',
            'created_at'=> Carbon::now(),
           
                
        ]);
        DB::table('categories')->insert([

            'category' => 'interior',
            'created_at'=> Carbon::now(),
           
                
        ]);
        DB::table('categories')->insert([

            'category' => 'construction',
            'created_at'=> Carbon::now(),
           
                
        ]);

        $this->call([
            AssingeRoleSeeder::class,
        ]);

    }
}
