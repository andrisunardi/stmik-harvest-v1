<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('access_menu', function (Blueprint $table) {
            $table->id();
            $table->foreignId('access_id')->nullable()->unsigned();
            $table->foreignId('menu_id')->nullable()->unsigned();
            $table->boolean('view')->nullable()->unsigned()->comment('1 = Yes, 0 = No')->default('0');
            $table->boolean('add')->nullable()->unsigned()->comment('1 = Yes, 0 = No')->default('0');
            $table->boolean('edit')->nullable()->unsigned()->comment('1 = Yes, 0 = No')->default('0');
            $table->boolean('delete')->nullable()->unsigned()->comment('1 = Yes, 0 = No')->default('0');
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
        Schema::dropIfExists('access_menu');
    }
};
