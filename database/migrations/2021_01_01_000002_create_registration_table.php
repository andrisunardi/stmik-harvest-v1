<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('registration', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->nullable()->unique();
            $table->string('email', 50)->nullable()->unique();
            $table->string('phone', 15)->nullable()->unique();
            $table->boolean('gender')->nullable()->unsigned()->comment('1 = Man, 2 = Woman');
            $table->string('school', 50)->nullable();
            $table->string('major', 50)->nullable();
            $table->string('city', 50)->nullable();
            $table->boolean('type')->nullable()->unsigned()->comment('1 = Morning - Afternoon Lecturer, 2 = Study & Work (Evening Lecture)');
            $table->boolean('active')->nullable()->unsigned()->comment('1 = Yes, 0 = No')->default('1');
            $table->foreignId('created_by')->nullable()->unsigned();
            $table->foreignId('updated_by')->nullable()->unsigned();
            $table->foreignId('deleted_by')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('registration');
    }
};
