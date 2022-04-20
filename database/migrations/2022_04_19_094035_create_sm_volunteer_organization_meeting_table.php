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
        Schema::create('sm_volunteer_organization_meeting', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default('0');
            $table->string('cate_name')->default('');
            $table->integer('nyks_number_meetings')->nullable();
            $table->integer('nyks_participants_male')->comment('Male')->nullable();
            $table->integer('nyks_participants_female')->comment('Female')->nullable();   
            $table->integer('nss_number_meetings')->nullable();
            $table->integer('nss_participants_male')->comment('Male')->nullable();
            $table->integer('nss_participants_female')->comment('Female')->nullable();   
              $table->integer('bsg_number_meetings')->nullable();
            $table->integer('bsg_participants_male')->comment('Male')->nullable();
            $table->integer('bsg_participants_female')->comment('Female')->nullable();   
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
        Schema::dropIfExists('sm_volunteer_organization_meeting');
    }
};
