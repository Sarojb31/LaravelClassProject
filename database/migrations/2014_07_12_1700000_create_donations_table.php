<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('category_id')->unsigned();
            $table->bigInteger('Donated_by')->unsigned();
            $table->string('name');
            $table->text('product_image');
            $table->Integer('quantity');

            $table->foreign('category_id')
            ->references('id')
            ->on('categories')
            ->onDelete('cascade');

             $table->foreign('Donated_by')
            ->references('id')
            ->on('users')
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
        Schema::dropIfExists('donations');
    }
}
