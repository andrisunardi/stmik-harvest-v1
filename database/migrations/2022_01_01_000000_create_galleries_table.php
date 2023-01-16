<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->boolean('category')->nullable()->unsigned();
            $table->string('name', 100)->nullable()->unique();
            $table->string('name_idn', 100)->nullable()->unique();
            $table->text('description')->nullable();
            $table->text('description_idn')->nullable();
            $table->string('tag', 100)->nullable();
            $table->string('tag_idn', 100)->nullable();
            $table->string('image', 120)->nullable();
            $table->string('video', 120)->nullable();
            $table->string('youtube', 200)->nullable();
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
        Schema::dropIfExists('galleries');
    }
};
