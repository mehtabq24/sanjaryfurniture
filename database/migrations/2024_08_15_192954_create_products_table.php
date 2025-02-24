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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('productCode');
            $table->string('productName');
            $table->string('productCategory');
            $table->string('productSubcategory');
            $table->string('productDescription');
            $table->string('productImage');
            $table->string('productSlug');
            $table->double('productPrice', 15, 8)->nullable()->default(123.4567);
            $table->double('productActualPrice', 15, 8)->nullable()->default(123.4567);
            $table->integer('productDisc')->unsigned()->nullable()->default(12);
            $table->string('productStatus');
            $table->string('updated_by',250);
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
        Schema::dropIfExists('products');
    }
};
