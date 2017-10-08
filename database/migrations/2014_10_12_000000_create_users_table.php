<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('admin')->default(false);
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('notes')->default('');
            $table->date('dateOfBirth')->nullable();
            $table->integer('daysAvailable')->default(5);
            $table->string('hired')->default('undefined');
            $table->integer('yearsExperience')->default(0);
            $table->integer('profileViews')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
} 
