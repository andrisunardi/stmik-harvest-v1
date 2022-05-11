<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create("lecturer_work_experience", function (Blueprint $table) {
            $table->id();
            $table->foreignId("lecturer_id")->nullable()->unsigned();
            $table->string("name", 100)->nullable();
            $table->string("name_id", 100)->nullable();
            $table->text("description")->nullable();
            $table->text("description_id")->nullable();
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
        Schema::dropIfExists("lecturer_work_experience");
    }
};
