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
        Schema::create('iec_special_iec', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default('0');
            $table->string('cate_name')->default('');
            $table->integer('posters')->nullable();
            $table->string('banners')->default('');
            $table->string('leaflet')->default('');
            $table->string('others')->default('');
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
        Schema::dropIfExists('iec_special_iec');
    }
};
