<?php

// Migration pour créer la table des transactions
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->ulid("uuid")->primary();
            $table->string('token')->unique();
            $table->string('transaction_id')->unique();
            $table->string('status');
            $table->ulid('demande_p002_id');
            $table->foreign('demande_p002_id')->references('uuid')->on('demande_p002_s');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}