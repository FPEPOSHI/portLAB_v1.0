<?php

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);

        DB::table('format')->insert([
            'name' => ".pdf",
        ]);
        DB::table('format')->insert([
            'name' => ".doc",
        ]);

        DB::table('format')->insert([
            'name' => ".docx",
        ]);

        DB::table('category')->insert([
            'name' => "Math",
        ]);
        DB::table('category')->insert([
            'name' => "Science",
        ]);
        DB::table('category')->insert([
            'name' => "History",
        ]);
        DB::table('category')->insert([
            'name' => "Information technology",
        ]);
        DB::table('category')->insert([
            'name' => "Physics",
        ]);
        DB::table('login')->insert([
            'username' => "[super[user]21*]",
            'password' => "4baba96e17fd7a4e6eefc2646b8613b3",//#bufe99*{}.
            'role' => 1,
        ]);



    }
}
