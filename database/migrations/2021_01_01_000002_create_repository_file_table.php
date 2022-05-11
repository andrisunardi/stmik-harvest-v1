<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create("repository_file", function (Blueprint $table) {
            $table->id();
            $table->foreignId("repository_id")->nullable()->unsigned();
            $table->string("name", 100)->nullable();
            $table->text("description")->nullable();
            $table->string("file", 120)->nullable();
            $table->boolean("public")->nullable()->unsigned()->comment("1 = Yes, 0 = No")->default("1");
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
        Schema::dropIfExists("repository_file");
    }
};
