<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('code', 15)->nullable()->unique();
            $table->foreignId('access_id')->nullable()->unsigned();
            $table->foreignId('user_id')->nullable()->unsigned();
            $table->string('name', 50)->nullable()->unique()->unique();
            $table->boolean('status')->nullable()->unsigned();
            $table->string('identity_card', 16)->nullable();
            $table->boolean('gender')->nullable()->unsigned();
            $table->string('birthday_at', 10)->nullable();
            $table->date('birthday')->nullable();
            $table->string('biography', 1000)->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('address', 1000)->nullable();
            $table->string('line', 20)->nullable();
            $table->string('whatsapp', 15)->nullable();
            $table->string('website', 50)->nullable();
            $table->string('facebook', 50)->nullable();
            $table->string('twitter', 50)->nullable();
            $table->string('google', 50)->nullable();
            $table->string('instagram', 50)->nullable();
            $table->string('youtube', 50)->nullable();
            $table->string('tumblr', 50)->nullable();
            $table->string('pinterest', 50)->nullable();
            $table->string('linkedin', 50)->nullable();
            $table->foreignId('bank_id')->nullable()->unsigned();
            $table->string('account_number', 20)->nullable();
            $table->string('account_name', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('username', 20)->nullable();
            $table->string('password', 60)->nullable();
            $table->string('image', 100)->nullable();
            $table->dateTime('join_date')->nullable();
            $table->boolean('is_resign')->nullable()->unsigned();
            $table->boolean('is_active')->nullable()->unsigned()->default(true);
            $table->foreignId('created_by_id')->nullable()->unsigned();
            $table->foreignId('updated_by_id')->nullable()->unsigned();
            $table->foreignId('deleted_by_id')->nullable()->unsigned();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clients');
    }
};
