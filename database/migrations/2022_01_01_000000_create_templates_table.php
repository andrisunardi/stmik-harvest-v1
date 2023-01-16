<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->id();
            $table->string('code', 17)->nullable()->unique();
            $table->foreignId('template_category_id')->nullable()->unsigned();
            $table->string('name', 100)->nullable()->unique();
            $table->text('description')->nullable();
            $table->foreignId('price')->nullable()->unsigned();
            $table->string('image', 100)->nullable();
            $table->dateTime('datetime')->nullable();
            $table->boolean('is_active')->nullable()->unsigned()->default(true);
            $table->string('slug', 50)->nullable();
            $table->foreignId('created_by_id')->nullable()->unsigned();
            $table->foreignId('updated_by_id')->nullable()->unsigned();
            $table->foreignId('deleted_by_id')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('templates');
    }
};
