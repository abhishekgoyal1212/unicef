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
        Schema::create('sm_number_meeting', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default('0');
            $table->string('cate_name')->default('');
            $table->string('lions_club')->nullable();
            $table->string('rotary')->nullable();
            $table->string('local_csos_Others')->nullable();
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
        Schema::dropIfExists('sm_number_meeting');
    }
};
