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
        Schema::create('parent_categories', function (Blueprint $table) {
            $table->id();
            $table->string('productCode')->unique()->nullable();
            $table->string('cateoryCode')->unique()->nullable();
            $table->string('categorySlug')->unique()->nullable();
            $table->string('categoryName')->unique()->nullable();
            $table->integer('parentCategory');
            $table->string('categoryDescription');
            $table->string('categoryImage');
            $table->string('status');
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
        Schema::dropIfExists('parent_categories');
    }
};
