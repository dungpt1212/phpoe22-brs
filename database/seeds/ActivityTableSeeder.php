<?php

use Illuminate\Database\Seeder;

class ActivityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('activities')->insert([
            'activity_name' => 'Follow',
            'type' => 1,
            'related_table' => 'users',
        ]);
        DB::table('activities')->insert([
            'activity_name' => 'Unfollow',
            'type' => 1,
            'related_table' => 'users',
        ]);
        DB::table('activities')->insert([
            'activity_name' => 'Like Book',
            'type' => 2,
            'related_table' => 'books',
        ]);
        DB::table('activities')->insert([
            'activity_name' => 'Write review',
            'type' => 2,
            'related_table' => 'books',
        ]);
        DB::table('activities')->insert([
            'activity_name' => 'Write comment',
            'type' => 2,
            'related_table' => 'books',
        ]);
    }
}
