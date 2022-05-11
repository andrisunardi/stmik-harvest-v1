<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create("course", function (Blueprint $table) {
            $table->id();
            $table->foreignId("study_program_id")->nullable()->unsigned();
            $table->string("code", 20)->nullable();
            $table->string("name", 100)->nullable();
            $table->boolean("sks")->nullable()->unsigned();
            $table->boolean("semester")->nullable()->unsigned();
            $table->boolean("active")->nullable()->unsigned()->comment("1 = Yes, 0 = No")->default("1");
            $table->foreignId("created_by")->nullable()->unsigned();
            $table->foreignId("updated_by")->nullable()->unsigned();
            $table->foreignId("deleted_by")->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists("course");
    }
};
