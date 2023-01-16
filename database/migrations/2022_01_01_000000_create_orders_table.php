<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('code', 15)->nullable()->unique();
            $table->boolean('status')->nullable()->unsigned();
            $table->boolean('type')->nullable()->unsigned();
            $table->string('name', 50)->nullable();
            $table->string('line', 20)->nullable();
            $table->string('whatsapp', 20)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('social_media', 50)->nullable();
            $table->string('other', 50)->nullable();
            $table->string('address', 1000)->nullable();
            $table->string('reference', 20)->nullable();
            $table->string('domain', 50)->nullable();
            $table->integer('price')->nullable()->unsigned();
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
        Schema::dropIfExists('orders');
    }
};
