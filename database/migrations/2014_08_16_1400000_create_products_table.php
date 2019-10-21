<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('product_name');
            $table->text('description');
            $table->integer('price')->nullable();
            $table->integer('quantity');
            $table->float('discount')->nullable();
            $table->bigInteger('cat_id')->unsigned();
            $table->text('product_image');
            $table->integer('added_by');

            $table->timestamps();

            $table->foreign('cat_id')
            ->references('id')
            ->on('categories')
            ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
