<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('name');
            $table->softDeletes();
            $table->timestamps();
        });

        //insert data
        DB::table('tags')->insert(array(
            array('name'=>'Sepakbola'),
            array('name'=>'AFC'),
            array('name'=>'AFF'),
            array('name'=>'Timnas Indonesia'),
            array('name'=>'Hidup Sehat'),
            array('name'=>'Indonesia'),
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
        Schema::dropIfExists('tags');
    }
}
