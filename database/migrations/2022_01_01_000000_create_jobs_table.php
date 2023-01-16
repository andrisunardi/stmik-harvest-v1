<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('code', 15)->nullable()->unique();
            $table->foreignId('job_category_id')->nullable()->unsigned();
            $table->string('status', 15)->nullable()->unique();
            $table->string('name', 100)->nullable()->unique();
            $table->text('description')->nullable();
            $table->string('company', 30)->nullable();
            $table->string('location', 50)->nullable();
            $table->string('position', 50)->nullable();
            $table->date('date')->nullable();
            $table->date('closed_at')->nullable();
            $table->string('slug', 100)->nullable();
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
        Schema::dropIfExists('jobs');
    }
};
