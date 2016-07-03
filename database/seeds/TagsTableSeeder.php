<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'name' => 'Bug',
            'colour' => 'bg-danger',
        ]);
        DB::table('tags')->insert([
            'name' => 'Enhancement',
            'colour' => 'bg-info',
        ]);
    }
}
