<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRozetkaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rozetka', function (Blueprint $table) {
                       $table->id();
                       $table->foreignId('parent_id',11)->nullable();
                       $table->foreignId('category_id',11)->nullable();
                       $table->foreignId('top_category_id',11)->nullable();
                       $table->string('title',255);
                       $table->string('manual_url',255);
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
        Schema::dropIfExists('rozetka');
    }
}
