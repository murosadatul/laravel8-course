<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->unsignedSmallInteger('id')->autoIncrement();
            $table->string('name');
            $table->softDeletes();
            $table->timestamps();
        });

        // insert data
        DB::table('categories')->insert(
            array(
                ['name'=>'News'],
                ['name'=>'Food'],
                ['name'=>'Finance'],
                ['name'=>'Teknologi'],
                ['name'=>'Sport'],
                ['name'=>'Edukasi']
            )
        );


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
