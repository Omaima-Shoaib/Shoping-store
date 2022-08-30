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
            // $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete("cascade");
            $table->foreignId('user_id')->constrained('users')->onDelete("cascade");
            $table->string('category');
            $table->text('description');

            $table->string('image',200)->nullable();
            $table->integer('quantity')->default('0');
            $table->integer('price')->nullable();
            $table->integer('total')->nullable();
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
