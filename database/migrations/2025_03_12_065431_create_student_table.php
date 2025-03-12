<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('regnumber')->unique();
            $table->string('name');
            $table->string('photo')->nullable();
            $table->string('gender');
            $table->date('dob');
            $table->string('email')->unique();
            $table->string('phonenumber')->nullable();
            $table->string('address')->nullable();
            $table->string('subject')->nullable();
            $table->unsignedBigInteger('teacher_id');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('student_subject', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('teacher_id');
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');

            $table->unique(['student_id', 'subject_id', 'teacher_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('student_subject');
        Schema::dropIfExists('students');
    }
};
