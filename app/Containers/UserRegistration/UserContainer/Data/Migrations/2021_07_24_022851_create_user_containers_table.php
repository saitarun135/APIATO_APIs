<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserContainersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_containers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullName');
            $table->string('email')->unique();
            $table->string('mobile');
            $table->string('password');
            $table->timestamps();
            //$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_containers');
    }
}
