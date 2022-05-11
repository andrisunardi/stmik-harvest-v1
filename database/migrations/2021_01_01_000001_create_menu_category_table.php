<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create("menu_category", function (Blueprint $table) {
            $table->id();
            $table->string("name", 50)->nullable()->unique();
            $table->string("name_id", 50)->nullable()->unique();
            $table->string("icon", 50)->nullable();
            $table->integer("sort")->nullable()->unsigned();
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
        Schema::dropIfExists("menu_category");
    }
};
