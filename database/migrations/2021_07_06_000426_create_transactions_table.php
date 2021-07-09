<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payer_id');
            $table->foreignId('payee_id');
            $table->decimal('value', 14, 2);
            $table->enum('status', ['PROCESSING', 'SUCCESS', 'ERROR']);
            $table->timestamps();
            
            $table->foreign('payer_id')->references('id')->on('users');
            $table->foreign('payee_id')->references('id')->on('users');
        });
    }
    
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign(['payer_id']);
            $table->dropForeign(['payee_id']);
        });

        Schema::dropIfExists('transactions');
    }
}
