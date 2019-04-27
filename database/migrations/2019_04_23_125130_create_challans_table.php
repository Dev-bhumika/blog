<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChallansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challans', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('company_id');
            $table->bigInteger('dcno');            
            $table->string('coating_type',15);            
            $table->bigInteger('company_dcno');
            $table->string('nos',500);
            $table->decimal('weight',8,2);
            $table->string('weight_unit',20);
            $table->date('date');
            $table->dateTime('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('challans');
    }
}
