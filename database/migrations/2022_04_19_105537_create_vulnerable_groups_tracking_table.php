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
        Schema::create('vulnerable_groups_tracking', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default('0');
            $table->string('cate_name')->default('');
            $table->integer('no_nomadic_locations')->nullable();
            $table->integer('no_construction_labour_sites')->nullable();
            $table->integer('no_bricklin_labour_sites')->nullable();
            $table->integer('no_mine_labour_sites')->nullable();
            $table->integer('no_excluded_groups_sites')->nullable();
            $table->integer('no_pastrol_community')->nullable();
            $table->integer('no_slum_dwellers')->nullable();
            $table->integer('no_sex_workers')->nullable();
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
        Schema::dropIfExists('vulnerable_groups_tracking');
    }
};
