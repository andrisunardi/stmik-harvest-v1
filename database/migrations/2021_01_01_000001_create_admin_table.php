<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->id();
            $table->foreignId('access_id')->nullable()->unsigned();
            $table->string('name', 50)->nullable()->unique();
            $table->string('email', 50)->nullable()->unique();
            $table->string('username', 50)->nullable()->unique();
            $table->string('password', 60)->nullable();
            $table->string('image', 70)->nullable()->unique();
            $table->boolean('active')->nullable()->unsigned()->comment('1 = Yes, 0 = No')->default('1');
            $table->foreignId('created_by')->nullable()->unsigned();
            $table->foreignId('updated_by')->nullable()->unsigned();
            $table->foreignId('deleted_by')->nullable()->unsigned();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('admin');
    }
};
