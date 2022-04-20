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
        Schema::create('sector_meeting', function (Blueprint $table) {
           $table->id();
            $table->integer('user_id')->default('0');
            $table->string('cate_name')->default('');
            $table->integer('total_district')->nullable();
            $table->integer('number_meetings')->nullable();
            $table->integer('meetings_participated')->nullable();
            $table->text('suggestions_consultan_description')->nullable();
             $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sector_meeting');
    }
};
