<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_category_id')->nullable()->unsigned();
            $table->string('title', 100)->nullable()->unique();
            $table->string('title_idn', 100)->nullable()->unique();
            $table->string('short_body', 160)->nullable();
            $table->string('short_body_idn', 160)->nullable();
            $table->text('body')->nullable();
            $table->text('body_idn')->nullable();
            $table->string('location', 100)->nullable();
            $table->dateTime('start')->nullable();
            $table->datetime('end')->nullable();
            $table->text('tag')->nullable();
            $table->text('tag_idn')->nullable();
            $table->string('image', 130)->nullable();
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
        Schema::dropIfExists('events');
    }
};
