<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('event', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_category_id')->nullable()->unsigned();
            $table->string('name', 100)->nullable()->unique();
            $table->string('name_id', 100)->nullable()->unique();
            $table->text('description')->nullable();
            $table->text('description_id')->nullable();
            $table->string('location', 100)->nullable();
            $table->dateTime('start')->nullable();
            $table->datetime('end')->nullable();
            $table->text('tag')->nullable();
            $table->text('tag_id')->nullable();
            $table->string('image', 120)->nullable();
            $table->string('slug', 100)->nullable()->unique();
            $table->boolean('active')->nullable()->unsigned()->comment('1 = Yes, 0 = No')->default('1');
            $table->foreignId('created_by_id')->nullable()->unsigned();
            $table->foreignId('updated_by_id')->nullable()->unsigned();
            $table->foreignId('deleted_by_id')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('event');
    }
};
