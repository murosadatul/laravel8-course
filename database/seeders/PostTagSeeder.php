<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //manual
        $faker = Factory::create();
        $i = 0;
        $tags = 1;
        while ($i < 100) {
            $i++;
            DB::insert('insert into post_tags (post_id,tag_id,created_at) values (?, ?, ?)', [$i,$tags,now()]);
            $tags++;
            if($tags==6){
                $tags = 1;
            }
        }
    }
}
