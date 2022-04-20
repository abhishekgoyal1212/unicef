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

        Schema::create('dhs_meeting', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default('0');
            $table->string('cate_name')->default('');
            $table->integer('wheather_meeting')->comment('YES = 1 , NO = 0')->nullable();
            $table->string('line_departments_meeting')->nullable();
            $table->integer('wheather_Consultant')->comment('YES = 1 , NO = 0')->nullable();
            $table->integer('suggestions_Consultant')->comment('YES = 1 , NO = 0')->nullable();
            $table->text('provided_description')->nullable();

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
        Schema::dropIfExists('dhs_meeting');
    }
};
