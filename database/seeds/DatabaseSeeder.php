<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //roles
        DB::table('roles')->insert([
            'name' => 'user',
        ]);
        DB::table('roles')->insert([
            'name' => 'admin',
        ]);

        //blocks
        DB::table('blocks')->insert([
            'name' => 'block 1',
        ]);
        DB::table('blocks')->insert([
            'name' => 'block 2',
        ]);
        DB::table('blocks')->insert([
            'name' => 'block 3',
        ]);
        DB::table('blocks')->insert([
            'name' => 'block 4',
        ]);
        DB::table('blocks')->insert([
            'name' => 'block 5',
        ]);
        DB::table('blocks')->insert([
            'name' => 'block 6',
        ]);
        DB::table('blocks')->insert([
            'name' => 'block 7',
        ]);
        DB::table('blocks')->insert([
            'name' => 'block 8',
        ]);

        //teachers
        DB::table('teachers')->insert([
            'name' => 'Jasper van Rosmalen',
        ]);
        DB::table('teachers')->insert([
            'name' => 'Stefan van Dockum',
        ]);
        DB::table('teachers')->insert([
            'name' => 'Dirk Pesman',
        ]);
        DB::table('teachers')->insert([
            'name' => 'Suzan van Rietschoten',
        ]);

        //modules
        DB::table('modules')->insert([
            'name' => 'WEBSPHP',
            'teacher' => 1
        ]);
        DB::table('modules')->insert([
            'name' => 'WEBSJS',
            'teacher' => 1

        ]);
        DB::table('modules')->insert([
            'name' => 'EPRES',
            'teacher' => 2

        ]);
        DB::table('modules')->insert([
            'name' => 'SOLLI',
            'teacher' => 2

        ]);
        DB::table('modules')->insert([
            'name' => 'PYTHON',
            'teacher' => 2
        ]);

        //categories
        DB::table('categories')->insert([
            'name' => 'Assessment',
            'description' => 'Doorbeunen'
        ]);
        DB::table('categories')->insert([
            'name' => 'Test',
            'description' => 'Multiple choice'
        ]);
        DB::table('categories')->insert([
            'name' => 'Homework',
            'description' => 'Work work work'
        ]);

        //assignments
        DB::table('assignments')->insert([
            'name' => 'Kaas',
            'description' => 'Kaas je moer',
        ]);

        //user
        DB::table('users')->insert([
            'id' => '1', 'name' => 'admin', 'email' => 'eyJpdiI6ImRjbVpNTkh0NENXSktBVDZVV0NNYmc9PSIsInZhbHVlIjoiRUdSVmZpOVlqVGg1YWcvWEQzZnNDc2ZhYlRHM0NsL3VQdkZ4Q3hzaWNrdz0iLCJtYWMiOiIyYWE1MmE5Yjg4MzJmNDM3M2VjMDZkYjk0OGNhZTQ2YjhmNTVhOGUwMWI4N2I2NjZmOGQ5MTZlNzUzOTIzZmYxIn0=', 'email_verified_at' => NULL, 'password' => '$2y$10$hHe8SqW7Y/ngQ3iiYxpHbOcsjHKOVcLfSErpFeXBMxj6K1.CrxUGG', 'remember_token' => NULL, 'created_at' => '2020-03-24 18:38:06', 'updated_at' => '2020-03-24 18:38:06'
        ]);

        DB::table('role_user')->insert([
            'id' => '1','role_id' => '2','user_id' => '1'
        ]);

        DB::table('role_user')->insert([
            'id' => '2','role_id' => '1','user_id' => '1'
        ]);

        //tags
        DB::table('tags')->insert([
            'name' => 'fun',
        ]);

        DB::table('tags')->insert([
            'name' => 'difficult',
        ]);

        DB::table('tags')->insert([
            'name' => 'easy',
        ]);

        DB::table('tags')->insert([
            'name' => 'boring',
        ]);

        DB::table('tags')->insert([
            'name' => 'kms',
        ]);
    }
}
