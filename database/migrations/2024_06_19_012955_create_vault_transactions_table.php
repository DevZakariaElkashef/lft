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
        Schema::create('vault_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bank_id')->nullable()->constrained('companies')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('amount')->nullable();
            $table->boolean('type');
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
        Schema::dropIfExists('vault_transactions');
    }
};
