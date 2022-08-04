<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->unsignedSmallInteger('id')->autoIncrement();
            $table->string('title');
            $table->mediumText('body');
            $table->timestamps();
        });

        DB::table('abouts')->insert(
            array(
                'title' => 'About',
                'body'  => 'Customize this section to tell your visitors a little bit about your publication, writers, content, or something else entirely. Totally up to you.'
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
        Schema::dropIfExists('abouts');


    }

}
