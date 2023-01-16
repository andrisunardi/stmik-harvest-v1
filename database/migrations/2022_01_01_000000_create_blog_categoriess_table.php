<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable()->unique();
            $table->string('name_id', 100)->nullable()->unique();
            $table->text('description')->nullable();
            $table->text('description_id')->nullable();
            $table->string('slug', 100)->nullable()->unique();
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
        Schema::dropIfExists('blog_categories');
    }
};
