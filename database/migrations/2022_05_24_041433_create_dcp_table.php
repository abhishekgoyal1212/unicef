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
        Schema::create('dcp', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default('0');
            $table->string('cate_name')->default('');
            $table->string('dcp_prepared')->default('')->comment('Yes = 1, No = 0');
            $table->integer('No_Health_Blocks_in_district')->nullable();
            $table->integer('No_Blocks_covered_in_DCP')->nullable();
            $table->string('Whether_DCP_covered_plan_of_Urban')->nullable();
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
        Schema::dropIfExists('dcp');
    }
};
