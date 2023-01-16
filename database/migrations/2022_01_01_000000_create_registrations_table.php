<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->nullable()->unique();
            $table->string('email', 50)->nullable()->unique();
            $table->string('phone', 20)->nullable()->unique();
            $table->boolean('gender')->nullable()->unsigned();
            $table->string('school', 50)->nullable();
            $table->string('major', 50)->nullable();
            $table->string('city', 50)->nullable();
            $table->boolean('type')->nullable()->unsigned();
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
        Schema::dropIfExists('registrations');
    }
};
