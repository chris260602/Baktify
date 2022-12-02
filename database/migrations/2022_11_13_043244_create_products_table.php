<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $files = Storage::allFiles("./productImages");
        Storage::delete($files);
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->mediumInteger('price');
            $table->smallInteger('stock');
            $table->string('image');
            $table->foreignId('category');
            $table->timestamps();

            $table->foreign('category')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $files = Storage::allFiles("./productImages");
        Storage::delete($files);
        Schema::dropIfExists('products');
    }
}
