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
        Schema::create('mass_media_mid_media', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default('0');
            $table->string('cate_name')->default('');
            $table->string('rally_covid_vaccination')->default('');
            $table->integer('rally_covid_reach_male')->comment('Male')->nullable();
            $table->integer('rally_covid_reach_female')->comment('Female')->nullable();
            $table->string('nukad_natak')->default('');
            $table->integer('nukad_natak_reach_male')->comment('Male')->nullable();
            $table->integer('nukad_natak_reach_female')->comment('Female')->nullable();
            $table->string('flok_program')->default('');
            $table->integer('flok_program_reach_male')->comment('Male')->nullable();
            $table->integer('flok_program_reach_female')->comment('Female')->nullable();
            $table->string('local_community')->default('');
            $table->integer('local_community_reach_male')->comment('Male')->nullable();
            $table->integer('local_community_reach_female')->comment('Female')->nullable();
            $table->string('cable_tv')->default('');
            $table->integer('cable_tv_reach_male')->comment('Male')->nullable();
            $table->integer('cable_tv_reach_female')->comment('Female')->nullable();
            $table->string('flash_mob')->default('');
            $table->integer('flash_mob_reach_male')->comment('Male')->nullable();
            $table->integer('flash_mob_reach_female')->comment('Female')->nullable();
            $table->string('others')->default('');
            $table->integer('others_reach_male')->comment('Male')->nullable();
            $table->integer('others_reach_female')->comment('Female')->nullable();
            
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
        Schema::dropIfExists('mass_media_mid_media');
    }
};
