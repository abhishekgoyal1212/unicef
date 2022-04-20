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
        Schema::create('coordination_line_dept_meeting', function (Blueprint $table) {
           $table->id();
            $table->integer('user_id')->default('0');
            $table->string('cate_name')->default('');
            $table->integer('panchayti_rural_development')->comment('1 = Yes , 0 = No')->nullable();
            $table->integer('icds')->comment('1 = Yes , 0 = No')->nullable();
            $table->integer('education')->comment('1 = Yes , 0 = No')->nullable();
            $table->integer('srlm')->comment('1 = Yes , 0 = No')->nullable();
            $table->integer('tribal_area')->comment('1 = Yes , 0 = No')->nullable();
            $table->integer('dmwo')->comment('1 = Yes , 0 = No')->nullable();
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
        Schema::dropIfExists('coordination_line_dept_meeting');
    }
};
