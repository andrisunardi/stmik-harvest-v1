<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('access', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('updated_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('deleted_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('access_menu', function (Blueprint $table) {
            $table->foreign('access_id')->references('id')->on('access')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('menu_id')->references('id')->on('menu')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('created_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('updated_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('deleted_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('admin', function (Blueprint $table) {
            $table->foreign('access_id')->references('id')->on('access')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('created_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('updated_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('deleted_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('admission_calendar', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('updated_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('deleted_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('banner', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('updated_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('deleted_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('blog', function (Blueprint $table) {
            $table->foreign('blog_category_id')->references('id')->on('blog_category')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('created_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('updated_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('deleted_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('blog_category', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('updated_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('deleted_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('contact', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('updated_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('deleted_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('event', function (Blueprint $table) {
            $table->foreign('event_category_id')->references('id')->on('event_category')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('created_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('updated_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('deleted_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('event_category', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('updated_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('deleted_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('faq', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('updated_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('deleted_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('gallery', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('updated_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('deleted_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('log', function (Blueprint $table) {
            $table->foreign('admin_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('menu_id')->references('id')->on('menu')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('created_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('updated_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('deleted_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('menu', function (Blueprint $table) {
            $table->foreign('menu_category_id')->references('id')->on('menu_category')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('created_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('updated_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('deleted_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('menu_category', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('updated_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('deleted_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('network', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('updated_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('deleted_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('procedure', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('updated_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('deleted_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('setting', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('updated_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('deleted_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('slider', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('updated_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('deleted_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('testimony', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('updated_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('deleted_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('tuition_fee', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('updated_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('deleted_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('user', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('updated_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('deleted_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('value', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('updated_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('deleted_by_id')->references('id')->on('admin')->constrained()->nullable()->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        if (env('APP_ENV') != 'testing') {
            Schema::table('access', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('access_menu', function (Blueprint $table) {
                $table->dropConstrainedForeignId('access_id');
                $table->dropConstrainedForeignId('menu_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('admin', function (Blueprint $table) {
                $table->dropConstrainedForeignId('access_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('admission_calendar', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('banner', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('blog', function (Blueprint $table) {
                $table->dropConstrainedForeignId('blog_category_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('blog_category', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('contact', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('event', function (Blueprint $table) {
                $table->dropConstrainedForeignId('event_category_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('event_category', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('faq', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('gallery', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('menu', function (Blueprint $table) {
                $table->dropConstrainedForeignId('menu_category_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('menu_category', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('log', function (Blueprint $table) {
                $table->dropConstrainedForeignId('admin_id');
                $table->dropConstrainedForeignId('menu_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('network', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('procedure', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('setting', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('slider', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('testimony', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('tuition_fee', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('user', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('value', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });
        }
    }
};
