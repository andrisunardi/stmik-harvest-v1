<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('absents', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('accesses', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('administrative_costs', function (Blueprint $table) {
            $table->foreign('bank_id')->references('id')->on('banks')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('advertisement_providers', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('advertisements', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('assignments', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('bank_bcas', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('bank_interests', function (Blueprint $table) {
            $table->foreign('bank_id')->references('id')->on('banks')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('banks', function (Blueprint $table) {
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
            $table->foreign('user_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('buy_advertisements', function (Blueprint $table) {
            $table->foreign('advertisement_provider_id')->references('id')->on('advertisement_providers')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('bank_id')->references('id')->on('banks')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('buy_domain_hostings', function (Blueprint $table) {
            $table->foreign('portfolio_id')->references('id')->on('portfolios')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('domain_hosting_provider_id')->references('id')->on('domain_hosting_providers')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('payment_id')->references('id')->on('payments')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('bank_id')->references('id')->on('banks')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('buy_endorses', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('bank_id')->references('id')->on('banks')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('buy_internets', function (Blueprint $table) {
            $table->foreign('internet_provider_id')->references('id')->on('internet_providers')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('bank_id')->references('id')->on('banks')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('buy_items', function (Blueprint $table) {
            $table->foreign('bank_id')->references('id')->on('banks')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('buy_phone_credits', function (Blueprint $table) {
            $table->foreign('phone_credit_provider_id')->references('id')->on('phone_credit_providers')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('bank_id')->references('id')->on('banks')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('buy_pln_tokens', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('careers', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('carts', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('product_id')->references('id')->on('products')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('charges', function (Blueprint $table) {
            $table->foreign('portfolio_id')->references('id')->on('portfolios')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('payment_id')->references('id')->on('payments')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('deposit_categories', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('deposits', function (Blueprint $table) {
            $table->foreign('deposit_category_id')->references('id')->on('deposit_categories')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('bank_id')->references('id')->on('banks')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('portfolio_dislikes', function (Blueprint $table) {
            $table->foreign('portfolio_id')->references('id')->on('portfolios')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('documentations', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('domain_hosting_providers', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('donation_categories', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('donations', function (Blueprint $table) {
            $table->foreign('donation_category_id')->references('id')->on('donation_categories')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('bank_id')->references('id')->on('banks')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('faqs', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('forum_categories', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('forums', function (Blueprint $table) {
            $table->foreign('forum_category_id')->references('id')->on('forum_categories')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('frameworks', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('game_categories', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('games', function (Blueprint $table) {
            $table->foreign('game_category_id')->references('id')->on('game_categories')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('google_adsenses', function (Blueprint $table) {
            $table->foreign('bank_id')->references('id')->on('banks')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('histories', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('internet_providers', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('invoices', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('invoice_details', function (Blueprint $table) {
            $table->foreign('invoice_id')->references('id')->on('invoices')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('job_categories', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('jobs', function (Blueprint $table) {
            $table->foreign('job_category_id')->references('id')->on('job_categories')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('portfolio_likes', function (Blueprint $table) {
            $table->foreign('portfolio_id')->references('id')->on('portfolios')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('logs', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('loyalties', function (Blueprint $table) {
            $table->foreign('portfolio_id')->references('id')->on('portfolios')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('bank_id')->references('id')->on('banks')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('news_categories', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('news', function (Blueprint $table) {
            $table->foreign('news_category_id')->references('id')->on('news_categories')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('newsletters', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('notifications', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('payment_categories', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->foreign('payment_category_id')->references('id')->on('payment_categories')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('portfolio_id')->references('id')->on('portfolios')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('bank_id')->references('id')->on('banks')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('phone_credit_providers', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('platforms', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('portfolio_categories', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('portfolios', function (Blueprint $table) {
            $table->foreign('portfolio_category_id')->references('id')->on('portfolio_categories')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('price_lists', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('procedure_categories', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('procedures', function (Blueprint $table) {
            $table->foreign('procedure_category_id')->references('id')->on('procedure_categories')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('product_categories', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreign('product_category_id')->references('id')->on('product_categories')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('progresses', function (Blueprint $table) {
            $table->foreign('portfolio_id')->references('id')->on('portfolios')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('promotions', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('quotes', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('refunds', function (Blueprint $table) {
            $table->foreign('portfolio_id')->references('id')->on('portfolios')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('bank_id')->references('id')->on('banks')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('register_influencers', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('revisions', function (Blueprint $table) {
            $table->foreign('portfolio_id')->references('id')->on('portfolios')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('rule_categories', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('rules', function (Blueprint $table) {
            $table->foreign('rule_category_id')->references('id')->on('rule_categories')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('salaries', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('bank_id')->references('id')->on('banks')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('services', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('settings', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('sponsors', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('tasks', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('template_categories', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('templates', function (Blueprint $table) {
            $table->foreign('template_category_id')->references('id')->on('template_categories')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('testimonials', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('portfolio_id')->references('id')->on('portfolios')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('access_id')->references('id')->on('accesses')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('platform_id')->references('id')->on('platforms')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('referral_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('bank_id')->references('id')->on('banks')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('withdraw_categories', function (Blueprint $table) {
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });

        Schema::table('withdraws', function (Blueprint $table) {
            $table->foreign('withdraw_category_id')->references('id')->on('withdraw_categories')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('bank_id')->references('id')->on('banks')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('created_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('updated_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('deleted_by_id')->references('id')->on('users')->constrained()->nullable()->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    public function down()
    {
        if (env('APP_ENV') != 'testing') {
            Schema::table('absents', function (Blueprint $table) {
                $table->dropConstrainedForeignId('user_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('accesses', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('administrative_costs', function (Blueprint $table) {
                $table->dropConstrainedForeignId('bank_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('advertisement_providers', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('advertisements', function (Blueprint $table) {
                $table->dropConstrainedForeignId('user_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('assignments', function (Blueprint $table) {
                $table->dropConstrainedForeignId('user_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('bank_bcas', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('bank_interests', function (Blueprint $table) {
                $table->dropConstrainedForeignId('bank_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('banks', function (Blueprint $table) {
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
                $table->dropConstrainedForeignId('user_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('buy_advertisements', function (Blueprint $table) {
                $table->dropConstrainedForeignId('advertisement_provider_id');
                $table->dropConstrainedForeignId('bank_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('buy_domain_hostings', function (Blueprint $table) {
                $table->dropConstrainedForeignId('portfolio_id');
                $table->dropConstrainedForeignId('domain_hosting_provider_id');
                $table->dropConstrainedForeignId('payment_id');
                $table->dropConstrainedForeignId('bank_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('buy_endorses', function (Blueprint $table) {
                $table->dropConstrainedForeignId('user_id');
                $table->dropConstrainedForeignId('bank_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('buy_internets', function (Blueprint $table) {
                $table->dropConstrainedForeignId('internet_provider_id');
                $table->dropConstrainedForeignId('bank_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('buy_items', function (Blueprint $table) {
                $table->dropConstrainedForeignId('bank_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('buy_phone_credits', function (Blueprint $table) {
                $table->dropConstrainedForeignId('phone_credit_provider_id');
                $table->dropConstrainedForeignId('bank_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('buy_pln_tokens', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('careers', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('carts', function (Blueprint $table) {
                $table->dropConstrainedForeignId('user_id');
                $table->dropConstrainedForeignId('product_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('charges', function (Blueprint $table) {
                $table->dropConstrainedForeignId('portfolio_id');
                $table->dropConstrainedForeignId('user_id');
                $table->dropConstrainedForeignId('payment_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('contacts', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('deposit_categories', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('deposits', function (Blueprint $table) {
                $table->dropConstrainedForeignId('deposit_category_id');
                $table->dropConstrainedForeignId('bank_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('portfolio_dislikes', function (Blueprint $table) {
                $table->dropConstrainedForeignId('portfolio_id');
                $table->dropConstrainedForeignId('user_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('documentations', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('domain_hosting_providers', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('donation_categories', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('donations', function (Blueprint $table) {
                $table->dropConstrainedForeignId('donation_category_id');
                $table->dropConstrainedForeignId('bank_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('faqs', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('forum_categories', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('forums', function (Blueprint $table) {
                $table->dropConstrainedForeignId('forum_category_id');
                $table->dropConstrainedForeignId('user_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('frameworks', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('game_categories', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('games', function (Blueprint $table) {
                $table->dropConstrainedForeignId('game_category_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('google_adsenses', function (Blueprint $table) {
                $table->dropConstrainedForeignId('bank_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('histories', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('internet_providers', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('invoices', function (Blueprint $table) {
                $table->dropConstrainedForeignId('user_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('invoice_details', function (Blueprint $table) {
                $table->dropConstrainedForeignId('invoice_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('job_categories', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('jobs', function (Blueprint $table) {
                $table->dropConstrainedForeignId('job_category_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('portfolio_likes', function (Blueprint $table) {
                $table->dropConstrainedForeignId('portfolio_id');
                $table->dropConstrainedForeignId('user_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('logs', function (Blueprint $table) {
                $table->dropConstrainedForeignId('user_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('loyalties', function (Blueprint $table) {
                $table->dropConstrainedForeignId('portfolio_id');
                $table->dropConstrainedForeignId('user_id');
                $table->dropConstrainedForeignId('bank_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('news_categories', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('news', function (Blueprint $table) {
                $table->dropConstrainedForeignId('news_category_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('newsletters', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('notifications', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('orders', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('payment_categories', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('payments', function (Blueprint $table) {
                $table->dropConstrainedForeignId('payment_category_id');
                $table->dropConstrainedForeignId('portfolio_id');
                $table->dropConstrainedForeignId('user_id');
                $table->dropConstrainedForeignId('bank_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('phone_credit_providers', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('platforms', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('portfolio_categories', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('portfolios', function (Blueprint $table) {
                $table->dropConstrainedForeignId('portfolio_category_id');
                $table->dropConstrainedForeignId('user_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('price_lists', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('procedure_categories', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('procedures', function (Blueprint $table) {
                $table->dropConstrainedForeignId('procedure_category_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('product_categories', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('products', function (Blueprint $table) {
                $table->dropConstrainedForeignId('product_category_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('progresses', function (Blueprint $table) {
                $table->dropConstrainedForeignId('portfolio_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('promotions', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('quotes', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('refunds', function (Blueprint $table) {
                $table->dropConstrainedForeignId('portfolio_id');
                $table->dropConstrainedForeignId('user_id');
                $table->dropConstrainedForeignId('bank_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('register_influencers', function (Blueprint $table) {
                $table->dropConstrainedForeignId('user_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('revisions', function (Blueprint $table) {
                $table->dropConstrainedForeignId('portfolio_id');
                $table->dropConstrainedForeignId('user_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('rule_categories', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('rules', function (Blueprint $table) {
                $table->dropConstrainedForeignId('rule_category_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('salaries', function (Blueprint $table) {
                $table->dropConstrainedForeignId('user_id');
                $table->dropConstrainedForeignId('bank_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('services', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('settings', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('sponsors', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('tasks', function (Blueprint $table) {
                $table->dropConstrainedForeignId('user_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('template_categories', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('templates', function (Blueprint $table) {
                $table->dropConstrainedForeignId('template_category_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('testimonials', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('users', function (Blueprint $table) {
                $table->dropConstrainedForeignId('portfolio_id');
                $table->dropConstrainedForeignId('access_id');
                $table->dropConstrainedForeignId('platform_id');
                $table->dropConstrainedForeignId('referral_id');
                $table->dropConstrainedForeignId('bank_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('withdraw_categories', function (Blueprint $table) {
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });

            Schema::table('withdraws', function (Blueprint $table) {
                $table->dropConstrainedForeignId('withdraw_category_id');
                $table->dropConstrainedForeignId('bank_id');
                $table->dropConstrainedForeignId('created_by_id');
                $table->dropConstrainedForeignId('updated_by_id');
                $table->dropConstrainedForeignId('deleted_by_id');
            });
        }
    }
};
