<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ItrStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itr_status', function (Blueprint $table) {
            $table->increments('id');

            $table->enum('status', ['completed', 'pending']);

            $table->integer('emp_id')->unsigned()->index()->nullable();
            $table->foreign('emp_id')->references('id')->on('employees');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itr_status');
    }
}
