<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table("access", function (Blueprint $table) {
            $table->foreign("created_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("updated_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("deleted_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
        });

        Schema::table("access_menu", function (Blueprint $table) {
            $table->foreign("access_id")->references("id")->on("access")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("menu_id")->references("id")->on("menu")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("created_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("updated_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("deleted_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
        });

        Schema::table("admin", function (Blueprint $table) {
            $table->foreign("access_id")->references("id")->on("access")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("created_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("updated_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("deleted_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
        });

        Schema::table("admission_calendar", function (Blueprint $table) {
            $table->foreign("created_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("updated_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("deleted_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
        });

        Schema::table("banner", function (Blueprint $table) {
            $table->foreign("created_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("updated_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("deleted_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
        });

        Schema::table("contact", function (Blueprint $table) {
            $table->foreign("created_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("updated_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("deleted_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
        });

        Schema::table("course", function (Blueprint $table) {
            $table->foreign("study_program_id")->references("id")->on("study_program")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("created_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("updated_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("deleted_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
        });

        Schema::table("course_lecturer", function (Blueprint $table) {
            $table->foreign("course_id")->references("id")->on("course")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("lecturer_id")->references("id")->on("lecturer")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("created_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("updated_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("deleted_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
        });

        Schema::table("faq", function (Blueprint $table) {
            $table->foreign("faq_category_id")->references("id")->on("faq_category")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("created_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("updated_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("deleted_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
        });

        Schema::table("faq_category", function (Blueprint $table) {
            $table->foreign("created_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("updated_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("deleted_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
        });

        Schema::table("gallery", function (Blueprint $table) {
            $table->foreign("created_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("updated_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("deleted_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
        });

        Schema::table("lecturer", function (Blueprint $table) {
            $table->foreign("created_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("updated_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("deleted_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
        });

        Schema::table("lecturer_education", function (Blueprint $table) {
            $table->foreign("lecturer_id")->references("id")->on("lecturer")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("created_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("updated_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("deleted_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
        });

        Schema::table("lecturer_work_experience", function (Blueprint $table) {
            $table->foreign("lecturer_id")->references("id")->on("lecturer")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("created_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("updated_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("deleted_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
        });

        Schema::table("log", function (Blueprint $table) {
            $table->foreign("admin_id")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("menu_id")->references("id")->on("menu")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("created_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("updated_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("deleted_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
        });

        Schema::table("magazine", function (Blueprint $table) {
            $table->foreign("created_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("updated_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("deleted_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
        });

        Schema::table("menu", function (Blueprint $table) {
            $table->foreign("menu_category_id")->references("id")->on("menu_category")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("created_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("updated_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("deleted_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
        });

        Schema::table("menu_category", function (Blueprint $table) {
            $table->foreign("created_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("updated_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("deleted_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
        });

        Schema::table("network", function (Blueprint $table) {
            $table->foreign("created_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("updated_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("deleted_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
        });

        Schema::table("news", function (Blueprint $table) {
            $table->foreign("news_category_id")->references("id")->on("news_category")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("created_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("updated_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("deleted_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
        });

        Schema::table("news_category", function (Blueprint $table) {
            $table->foreign("created_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("updated_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("deleted_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
        });

        Schema::table("news_comment", function (Blueprint $table) {
            $table->foreign("news_id")->references("id")->on("news")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("created_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("updated_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("deleted_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
        });

        Schema::table("procedure", function (Blueprint $table) {
            $table->foreign("created_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("updated_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("deleted_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
        });

        Schema::table("setting", function (Blueprint $table) {
            $table->foreign("created_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("updated_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("deleted_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
        });

        Schema::table("slider", function (Blueprint $table) {
            $table->foreign("created_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("updated_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("deleted_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
        });

        Schema::table("study_program", function (Blueprint $table) {
            $table->foreign("study_program_category_id")->references("id")->on("study_program_category")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("created_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("updated_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("deleted_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
        });

        Schema::table("study_program_category", function (Blueprint $table) {
            $table->foreign("created_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("updated_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("deleted_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
        });

        Schema::table("testimony", function (Blueprint $table) {
            $table->foreign("created_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("updated_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("deleted_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
        });

        Schema::table("tuition_fee", function (Blueprint $table) {
            $table->foreign("created_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("updated_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("deleted_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
        });

        Schema::table("user", function (Blueprint $table) {
            $table->foreign("created_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("updated_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("deleted_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
        });

        Schema::table("value", function (Blueprint $table) {
            $table->foreign("created_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("updated_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("deleted_by")->references("id")->on("admin")->constrained()->nullable()->onUpdate("cascade")->onDelete("cascade");
        });
    }

    public function down()
    {
        if (env("APP_ENV") != "testing") {
            Schema::table("access", function (Blueprint $table) {
                $table->dropConstrainedForeignId("created_by");
                $table->dropConstrainedForeignId("updated_by");
                $table->dropConstrainedForeignId("deleted_by");
            });

            Schema::table("access_menu", function (Blueprint $table) {
                $table->dropConstrainedForeignId("access_id");
                $table->dropConstrainedForeignId("menu_id");
                $table->dropConstrainedForeignId("created_by");
                $table->dropConstrainedForeignId("updated_by");
                $table->dropConstrainedForeignId("deleted_by");
            });

            Schema::table("admin", function (Blueprint $table) {
                $table->dropConstrainedForeignId("access_id");
                $table->dropConstrainedForeignId("created_by");
                $table->dropConstrainedForeignId("updated_by");
                $table->dropConstrainedForeignId("deleted_by");
            });

            Schema::table("admission_calendar", function (Blueprint $table) {
                $table->dropConstrainedForeignId("created_by");
                $table->dropConstrainedForeignId("updated_by");
                $table->dropConstrainedForeignId("deleted_by");
            });

            Schema::table("banner", function (Blueprint $table) {
                $table->dropConstrainedForeignId("created_by");
                $table->dropConstrainedForeignId("updated_by");
                $table->dropConstrainedForeignId("deleted_by");
            });

            Schema::table("contact", function (Blueprint $table) {
                $table->dropConstrainedForeignId("created_by");
                $table->dropConstrainedForeignId("updated_by");
                $table->dropConstrainedForeignId("deleted_by");
            });

            Schema::table("course", function (Blueprint $table) {
                $table->dropConstrainedForeignId("study_program_id");
                $table->dropConstrainedForeignId("created_by");
                $table->dropConstrainedForeignId("updated_by");
                $table->dropConstrainedForeignId("deleted_by");
            });

            Schema::table("course_lecturer", function (Blueprint $table) {
                $table->dropConstrainedForeignId("course_id");
                $table->dropConstrainedForeignId("lecturer_id");
                $table->dropConstrainedForeignId("created_by");
                $table->dropConstrainedForeignId("updated_by");
                $table->dropConstrainedForeignId("deleted_by");
            });

            Schema::table("faq", function (Blueprint $table) {
                $table->dropConstrainedForeignId("faq_category_id");
                $table->dropConstrainedForeignId("created_by");
                $table->dropConstrainedForeignId("updated_by");
                $table->dropConstrainedForeignId("deleted_by");
            });

            Schema::table("faq_category", function (Blueprint $table) {
                $table->dropConstrainedForeignId("created_by");
                $table->dropConstrainedForeignId("updated_by");
                $table->dropConstrainedForeignId("deleted_by");
            });

            Schema::table("gallery", function (Blueprint $table) {
                $table->dropConstrainedForeignId("created_by");
                $table->dropConstrainedForeignId("updated_by");
                $table->dropConstrainedForeignId("deleted_by");
            });

            Schema::table("lecturer", function (Blueprint $table) {
                $table->dropConstrainedForeignId("created_by");
                $table->dropConstrainedForeignId("updated_by");
                $table->dropConstrainedForeignId("deleted_by");
            });

            Schema::table("lecturer_education", function (Blueprint $table) {
                $table->dropConstrainedForeignId("lecturer_id");
                $table->dropConstrainedForeignId("created_by");
                $table->dropConstrainedForeignId("updated_by");
                $table->dropConstrainedForeignId("deleted_by");
            });

            Schema::table("lecturer_work_experience", function (Blueprint $table) {
                $table->dropConstrainedForeignId("lecturer_id");
                $table->dropConstrainedForeignId("created_by");
                $table->dropConstrainedForeignId("updated_by");
                $table->dropConstrainedForeignId("deleted_by");
            });

            Schema::table("menu", function (Blueprint $table) {
                $table->dropConstrainedForeignId("menu_category_id");
                $table->dropConstrainedForeignId("created_by");
                $table->dropConstrainedForeignId("updated_by");
                $table->dropConstrainedForeignId("deleted_by");
            });

            Schema::table("menu_category", function (Blueprint $table) {
                $table->dropConstrainedForeignId("created_by");
                $table->dropConstrainedForeignId("updated_by");
                $table->dropConstrainedForeignId("deleted_by");
            });

            Schema::table("log", function (Blueprint $table) {
                $table->dropConstrainedForeignId("admin_id");
                $table->dropConstrainedForeignId("menu_id");
                $table->dropConstrainedForeignId("created_by");
                $table->dropConstrainedForeignId("updated_by");
                $table->dropConstrainedForeignId("deleted_by");
            });

            Schema::table("network", function (Blueprint $table) {
                $table->dropConstrainedForeignId("created_by");
                $table->dropConstrainedForeignId("updated_by");
                $table->dropConstrainedForeignId("deleted_by");
            });

            Schema::table("news", function (Blueprint $table) {
                $table->dropConstrainedForeignId("news_category_id");
                $table->dropConstrainedForeignId("created_by");
                $table->dropConstrainedForeignId("updated_by");
                $table->dropConstrainedForeignId("deleted_by");
            });

            Schema::table("news_category", function (Blueprint $table) {
                $table->dropConstrainedForeignId("created_by");
                $table->dropConstrainedForeignId("updated_by");
                $table->dropConstrainedForeignId("deleted_by");
            });

            Schema::table("news_comment", function (Blueprint $table) {
                $table->dropConstrainedForeignId("news_id");
                $table->dropConstrainedForeignId("created_by");
                $table->dropConstrainedForeignId("updated_by");
                $table->dropConstrainedForeignId("deleted_by");
            });

            Schema::table("procedure", function (Blueprint $table) {
                $table->dropConstrainedForeignId("created_by");
                $table->dropConstrainedForeignId("updated_by");
                $table->dropConstrainedForeignId("deleted_by");
            });

            Schema::table("setting", function (Blueprint $table) {
                $table->dropConstrainedForeignId("created_by");
                $table->dropConstrainedForeignId("updated_by");
                $table->dropConstrainedForeignId("deleted_by");
            });

            Schema::table("slider", function (Blueprint $table) {
                $table->dropConstrainedForeignId("created_by");
                $table->dropConstrainedForeignId("updated_by");
                $table->dropConstrainedForeignId("deleted_by");
            });

            Schema::table("study_program", function (Blueprint $table) {
                $table->dropConstrainedForeignId("study_program_category_id");
                $table->dropConstrainedForeignId("created_by");
                $table->dropConstrainedForeignId("updated_by");
                $table->dropConstrainedForeignId("deleted_by");
            });

            Schema::table("study_program_category", function (Blueprint $table) {
                $table->dropConstrainedForeignId("created_by");
                $table->dropConstrainedForeignId("updated_by");
                $table->dropConstrainedForeignId("deleted_by");
            });

            Schema::table("testimony", function (Blueprint $table) {
                $table->dropConstrainedForeignId("created_by");
                $table->dropConstrainedForeignId("updated_by");
                $table->dropConstrainedForeignId("deleted_by");
            });

            Schema::table("tuition_fee", function (Blueprint $table) {
                $table->dropConstrainedForeignId("created_by");
                $table->dropConstrainedForeignId("updated_by");
                $table->dropConstrainedForeignId("deleted_by");
            });

            Schema::table("user", function (Blueprint $table) {
                $table->dropConstrainedForeignId("created_by");
                $table->dropConstrainedForeignId("updated_by");
                $table->dropConstrainedForeignId("deleted_by");
            });

            Schema::table("value", function (Blueprint $table) {
                $table->dropConstrainedForeignId("created_by");
                $table->dropConstrainedForeignId("updated_by");
                $table->dropConstrainedForeignId("deleted_by");
            });
        }
    }
};
