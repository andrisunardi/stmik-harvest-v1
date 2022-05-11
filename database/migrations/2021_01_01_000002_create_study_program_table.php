<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create("study_program", function (Blueprint $table) {
            $table->id();
            $table->foreignId("study_program_category_id")->nullable()->unsigned();
            $table->string("name", 100)->nullable()->unique();
            $table->string("name_id", 100)->nullable()->unique();
            $table->text("description")->nullable();
            $table->text("description_id")->nullable();
            $table->text("vision")->nullable();
            $table->text("vision_id")->nullable();
            $table->text("mission")->nullable();
            $table->text("mission_id")->nullable();
            $table->string("degree", 10)->nullable()->unique();
            $table->string("duration", 100)->nullable();
            $table->string("price", 100)->nullable();
            $table->string("image", 120)->nullable();
            $table->string("slug", 100)->nullable()->unique();
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
        Schema::dropIfExists("study_program");
    }
};
