<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role',['admin','user','rental'])->defaultValue('user');
            $table->timestamps();
        });
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->string('name');
            $table->string('image');
            $table->string('description');
            $table->string('price');
            $table->string('status');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_car');
            $table->string('status');
            $table->foreign('id_car')->references('id')->on('cars')->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->timestamps();
        });

        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('image');
            $table->string('description');
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