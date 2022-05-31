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
        Schema::table('vulnerable_groups_tracking', function (Blueprint $table) {
            $table->integer('hrg_tracked')->after('no_sex_workers')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vulnerable_groups_tracking', function (Blueprint $table) {
          
        });
    }
};
