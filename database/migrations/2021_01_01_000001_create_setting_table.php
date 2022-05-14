<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create("setting", function (Blueprint $table) {
            $table->id();
            $table->string("sms", 15)->nullable();
            $table->string("call", 15)->nullable();
            $table->string("fax", 15)->nullable();
            $table->string("whatsapp", 15)->nullable();
            $table->string("email", 50)->nullable();
            $table->string("address", 200)->nullable();
            $table->string("google_maps", 100)->nullable();
            $table->string("google_maps_iframe", 300)->nullable();
            $table->text("about_us")->nullable();
            $table->text("about_us_id")->nullable();
            $table->text("vision")->nullable();
            $table->text("vision_id")->nullable();
            $table->text("mission")->nullable();
            $table->text("mission_id")->nullable();
            $table->text("history")->nullable();
            $table->text("history_id")->nullable();
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
        Schema::dropIfExists("setting");
    }
};
