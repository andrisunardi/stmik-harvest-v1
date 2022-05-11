<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create("repository_contributor", function (Blueprint $table) {
            $table->id();
            $table->foreignId("repository_id")->nullable()->unsigned();
            $table->foreignId("lecturer_id")->nullable()->unsigned();
            $table->string("code", 50)->nullable();
            $table->string("role", 50)->nullable();
            $table->string("name", 50)->nullable();
            $table->string("email", 50)->nullable();
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
        Schema::dropIfExists("repository_contributor");
    }
};
