<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create("news_comment", function (Blueprint $table) {
            $table->id();
            $table->foreignId("news_id")->nullable()->unsigned();
            $table->string("name", 50)->nullable();
            $table->string("phone", 15)->nullable();
            $table->string("email", 50)->nullable();
            $table->string("title", 100)->nullable();
            $table->string("message", 10-0)->nullable();
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
        Schema::dropIfExists("news_comment");
    }
};
