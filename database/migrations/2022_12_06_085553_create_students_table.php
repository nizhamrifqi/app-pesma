<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nim')->unique;
            $table->string('full_name');
            $table->enum('gender',['Male','Female']);
            $table->foreignId('room_id');
            $table->foreignId('faculty_id');
            $table->foreignId('parent_id');
            $table->string('password');
            $table->string('phone');
            $table->string('img_student')->nullable();
            $table->string('ket')->default('1');
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
        Schema::dropIfExists('students');
    }
}
