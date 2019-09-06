<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutflowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outflow', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('project_id');
            $table->string('description');
            $table->date('execution_date');
            $table->bigInteger('cost');
            $table->bigInteger('total')->nullable();
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
        Schema::dropIfExists('outflow');
    }
}
