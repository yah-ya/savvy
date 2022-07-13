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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('card_id')->index();
            $table->bigInteger('amount');
            $table->integer('destination_card')->index();
            $table->integer('wage');
            $table->timestamps();

//            $table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');
//            $table->foreign('destination_card')->references('id')->on('cards')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
