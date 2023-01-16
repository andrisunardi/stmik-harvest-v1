<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('code', 15)->nullable()->unique();
            $table->foreignId('portfolio_category_id')->nullable()->unsigned();
            $table->foreignId('user_id')->nullable()->unsigned();
            $table->string('username_cpanel', 50)->nullable();
            $table->string('password_cpanel', 50)->nullable();
            $table->boolean('status')->nullable()->unsigned();
            $table->string('name', 200)->nullable()->unique();
            $table->string('short_description', 160)->nullable();
            $table->text('description')->nullable();
            $table->string('link', 100)->nullable();
            $table->foreignId('price')->nullable()->unsigned();
            $table->string('logo', 200)->nullable();
            $table->string('image_1', 200)->nullable();
            $table->string('image_2', 200)->nullable();
            $table->string('image_3', 200)->nullable();
            $table->string('image_4', 200)->nullable();
            $table->string('image_5', 200)->nullable();
            $table->text('testimonial')->nullable();
            $table->string('source_testimonial', 100)->nullable();
            $table->date('expired')->nullable();
            $table->dateTime('datetime')->nullable();
            $table->text('notes')->nullable();
            $table->string('slug', 200)->nullable();
            $table->boolean('is_publish')->nullable()->unsigned()->default(true);
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
        Schema::dropIfExists('portfolios');
    }
};
