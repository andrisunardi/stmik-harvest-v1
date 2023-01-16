<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('admission_calendars', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('banners', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('blog_categories', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('blogs', function (Blueprint $table) {
            $table->foreign('blog_category_id')->references('id')->on('blog_categories')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('event_categories', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('events', function (Blueprint $table) {
            $table->foreign('event_category_id')->references('id')->on('event_categories')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('faqs', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('galleries', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('networks', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('offers', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('procedures', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('registrations', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('settings', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('sliders', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('testimonies', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('tuition_fees', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('values', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    public function down()
    {
        if (env('APP_ENV') != 'testing') {
            Schema::table('admission_calendars', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('banners', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('blog_categories', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('blogs', function (Blueprint $table) {
                $table->dropConstrainedForeignId('blog_category_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('contacts', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('event_categories', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('events', function (Blueprint $table) {
                $table->dropConstrainedForeignId('event_category_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('faqs', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('galleries', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('networks', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('offers', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('procedures', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('registrations', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('settings', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('sliders', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('testimonies', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('tuition_fees', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('users', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('values', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });
        }
    }
};
