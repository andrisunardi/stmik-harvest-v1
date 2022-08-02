<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('log', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->nullable()->unsigned();
            $table->foreignId('menu_id')->nullable()->unsigned();
            $table->bigInteger('row')->nullable()->unsigned();
            $table->boolean('activity')->nullable()->unsigned()->comment('1 = Created, 2 = Updated, 3 = Deleted, 4 = Restored, 5 = Deleted Permanent')->default('1');
            $table->boolean('active')->nullable()->unsigned()->comment('1 = Yes, 0 = No')->default('1');
            $table->foreignId('created_by_id')->nullable()->unsigned();
            $table->foreignId('updated_by_id')->nullable()->unsigned();
            $table->foreignId('deleted_by_id')->nullable()->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('log');
    }
};
