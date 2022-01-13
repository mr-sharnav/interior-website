<?php

namespace Database\Seeders;

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

        ]);
        DB::table('users')->insert([

            'name' => 'Adminstrator',
            'email' => 'admin@mail.com',
            'password' => Hash::make('12345678'),

        ]);
        DB::table('roles')->insert([

            'name' => 'super-admin',
            'guard_name' => 'web',
           
                
        ]);
        DB::table('roles')->insert([

            'name' => 'admin',
            'guard_name' => 'web',
           
                
        ]);
        DB::table('categories')->insert([

            'category' => 'interior',
           
                
        ]);
        DB::table('categories')->insert([

            'category' => 'construction',
           
                
        ]);

        $this->call([
            AssingeRoleSeeder::class,
        ]);

    }
}
