<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRozetkaProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rozetka_products', function (Blueprint $table) {
            $table->id();
            $table->string('title',255);
            $table->float('price');
            $table->float('old_price');
            $table->foreignId('parent_category_id',11)->nullable();
            $table->foreignId('category_id',11)->nullable();
            $table->string('href',255);
            $table->string('image_main',255);
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
        Schema::dropIfExists('rozetka_products');
    }
}
