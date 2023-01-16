<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('code', 15)->nullable()->unique();
            $table->foreignId('portfolio_id')->nullable()->unsigned();
            $table->foreignId('access_id')->nullable()->unsigned();
            $table->foreignId('platform_id')->nullable()->unsigned();
            $table->foreignId('referral_id')->nullable()->unsigned();
            $table->string('name', 50)->nullable()->unique();
            $table->foreignId('level')->nullable()->unsigned();
            $table->foreignId('exp')->nullable()->unsigned();
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
            $table->string('position', 50)->nullable();
            $table->string('company', 50)->nullable();
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
            $table->text('notes')->nullable();
            $table->string('slug', 50)->nullable();
            $table->string('ip', 15)->nullable();
            $table->dateTime('join_date')->nullable();
            $table->boolean('is_online')->nullable()->unsigned();
            $table->boolean('is_resign')->nullable()->unsigned();
            $table->boolean('is_newsletter')->nullable()->unsigned();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->timestamp('identity_card_verified_at')->nullable();
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
        Schema::dropIfExists('users');
    }
};
