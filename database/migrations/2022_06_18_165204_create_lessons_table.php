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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('url');
            $table->string('iframe');
            $table->unsignedBigInteger('module_id');
            $table->unsignedBigInteger('platform_id')->nullable();
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
            $table->foreign('platform_id')->references('id')->on('platforms')->onDelete('set null');
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
        Schema::dropIfExists('lessons');
    }
};
