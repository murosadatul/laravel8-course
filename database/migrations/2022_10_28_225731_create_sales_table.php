<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->date('order_date');
            $table->string('region');
            $table->string('item');
            $table->string('sales_man');
            $table->smallInteger('unit')->unsigned()->nullable();
            $table->timestamps();
        });

        // Schema::table('sales', function(Blueprint $table){
        //     $table->dropColumn('unit_price');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        // Schema::dropIfExists('sales');
    }
}
