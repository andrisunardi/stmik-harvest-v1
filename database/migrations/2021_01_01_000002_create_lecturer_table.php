<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create("lecturer", function (Blueprint $table) {
            $table->id();
            $table->string("code", 10)->nullable()->unique();
            $table->string("name", 100)->nullable()->unique();
            $table->text("description")->nullable();
            $table->string("job", 100)->nullable();
            $table->string("phone", 15)->nullable();
            $table->string("email", 50)->nullable();
            $table->string("facebook", 100)->nullable();
            $table->string("twitter", 100)->nullable();
            $table->string("instagram", 100)->nullable();
            $table->string("linkedin", 100)->nullable();
            $table->string("scholar", 100)->nullable();
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
        Schema::dropIfExists("lecturer");
    }
};
