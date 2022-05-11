<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create("repository", function (Blueprint $table) {
            $table->id();
            $table->foreignId("repository_subject_id")->nullable()->unsigned();
            $table->foreignId("study_program_id")->nullable()->unsigned();
            $table->foreignId("user_id")->nullable()->unsigned();
            $table->boolean("status")->nullable()->unsigned()->comment("0 = Pending, 1 = Approved, 2 = Rejected")->default("0");
            $table->string("title", 100)->nullable()->unique();
            $table->string("journal_title", 100)->nullable();
            $table->date("date")->nullable();
            $table->date("publication_date")->nullable();
            $table->string("first_name", 100)->nullable();
            $table->string("last_name", 100)->nullable();
            $table->string("corporate_author", 100)->nullable();
            $table->string("publisher", 100)->nullable();
            $table->year("year")->nullable();
            $table->text("abstract")->nullable();
            $table->string("url", 100)->nullable();
            $table->string("keyword", 100)->nullable();
            $table->string("volume", 100)->nullable();
            $table->string("issue", 100)->nullable();
            $table->integer("page")->nullable()->unsigned();
            $table->integer("first_page")->nullable()->unsigned();
            $table->integer("last_page")->nullable()->unsigned();
            $table->string("scholar", 100)->nullable();
            $table->string("image", 120)->nullable();
            $table->string("file", 120)->nullable();
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
        Schema::dropIfExists("repository");
    }
};
