<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('buy_internets', function (Blueprint $table) {
            $table->id();
            $table->string('code', 15)->nullable()->unique();
            $table->foreignId('internet_provider_id')->nullable()->unsigned();
            $table->foreignId('bank_id')->nullable()->unsigned();
            $table->string('account_number', 20)->nullable();
            $table->string('account_name', 30)->nullable();
            $table->integer('amount')->nullable()->unsigned();
            $table->string('image', 100)->nullable();
            $table->dateTime('datetime')->nullable();
            $table->text('notes')->nullable();
            $table->boolean('is_active')->nullable()->unsigned()->default(true);
            $table->foreignId('created_by_id')->nullable()->unsigned();
            $table->foreignId('updated_by_id')->nullable()->unsigned();
            $table->foreignId('deleted_by_id')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('buy_internets');
    }
};
