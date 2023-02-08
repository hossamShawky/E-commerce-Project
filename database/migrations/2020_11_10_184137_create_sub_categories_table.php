<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->string('translate_lang');
            $table->integer('translate_of');
            $table->string('name');
            $table->string('slug');
            $table->string('photo');
            $table->enum('active',array(0,1))->default(1);
            $table->integer('parent_id')->default(0);
            $table->foreignId('category_id');
            $table->foreign('category_id')->references('id')->on('main_categories');
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
        Schema::dropIfExists('sub_categories');
    }
}
