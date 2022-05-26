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
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('body');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            // 画像追加
            $table->unsignedBigInteger('image1')
                ->nullable()
                ->constrained('images');
            $table->unsignedBigInteger('image2')
                ->nullable()
                ->constrained('images');
            $table->unsignedBigInteger('image3')
                ->nullable()
                ->constrained('images');
            $table->unsignedBigInteger('image4')
                ->nullable()
                ->constrained('images');
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
        Schema::dropIfExists('articles');
    }
};
