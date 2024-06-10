<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('interns', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->foreignId('university_id')->constrained();
            $table->string('profile')->nullable();
            $table->string('phone');
            $table->string('roll_no');
            $table->string('nrc_no');
            $table->date('date_of_birth');
            $table->enum('gender', ['male', 'female']);
            $table->string('education');
            $table->string('specialization');
            $table->text('class_project');
            $table->text('activity');
            $table->text('skill');
            $table->text('qualification');
            $table->text('address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interns');
    }
};
