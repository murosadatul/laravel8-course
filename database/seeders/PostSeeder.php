<?php

namespace Database\Seeders;

use App\Models\Phone;
use App\Models\Post;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return voidc
     */
    public function run()
    {

        //using factory
        // Phone::factory()->count(100)->create();

        //manully
        $faker = Factory::create();
        $i = 0;
        $categori = 1;
        while ($i < 100) {
            DB::insert('insert into posts (title,category_id, body,image, author, created_at) values (?, ?, ?,?,?,?)', [$faker->name,$categori ,$faker->paragraph, 'images/map.jpg', 'Mahmud',now()]);
            $i++;
            $categori++;
            if($categori==6){
                $categori = 1;
            }
        }
    }
}
