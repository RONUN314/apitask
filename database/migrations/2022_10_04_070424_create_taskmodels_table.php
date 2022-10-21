<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taskmodels', function (Blueprint $table) {
            $table->id();
            $table->string('taskdesc');
            $table->string('location');
            $table->string('percentage');
            $table->string('priority');
            $table->string('type');
            $table->string('status');
            $table->date('startdate');
            $table->date('enddate');
            $table->string('duration');
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
        Schema::dropIfExists('taskmodels');
    }
};
