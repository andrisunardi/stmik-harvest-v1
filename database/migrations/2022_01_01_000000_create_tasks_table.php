<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('code', 12)->nullable()->unique();
            $table->foreignId('user_id')->nullable()->unsigned();
            $table->boolean('status')->nullable()->unsigned();
            $table->boolean('repeat')->nullable()->unsigned();
            $table->string('name', 100)->nullable()->unique();
            $table->text('description')->nullable();
            $table->dateTime('datetime')->nullable();
            $table->dateTime('deadline')->nullable();
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
        Schema::dropIfExists('tasks');
    }
};
