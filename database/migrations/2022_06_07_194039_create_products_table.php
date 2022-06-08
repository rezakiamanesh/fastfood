<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('title');
            $table->string('slug');
            $table->longText('description');
            $table->string('price');
            $table->integer('stock')->default(0)->comment("موجودی");
            $table->string('time_to_prepare')->default(15)->comment('مدت زمان برای آماده شدن');
            $table->boolean('status')->default(0);
            $table->bigInteger('viewCount')->default(0);
            $table->bigInteger('commentCount')->default(0);
            $table->bigInteger('soldCount')->default(0);
            $table->softDeletes();
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
}
