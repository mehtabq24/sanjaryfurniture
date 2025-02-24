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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('user_name')->nullable();
            $table->string('user_email')->nullable();
            $table->string('user_phone')->nullable();
            $table->string('productCode')->nullable();
            $table->string('productName')->nullable();
            $table->string('productCategory')->nullable();
            $table->string('productSubcategory')->nullable();
            $table->string('productImage')->nullable();
            $table->integer('quantity')->unsigned()->nullable()->default(1);
            $table->double('productPrice', 15, 2)->nullable()->default(0.0);
            $table->double('productActualPrice', 15, 2)->nullable()->default(0.0);
            $table->double('total', 15, 2)->nullable()->default(0.0);
            $table->integer('productDisc')->unsigned()->nullable()->default(12);
            $table->string('user_id')->nullable();
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
        Schema::dropIfExists('carts');
    }
};
