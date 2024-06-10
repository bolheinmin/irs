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
        Schema::create('weekly_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('internship_id')->constrained();
            $table->integer('week_no');
            $table->date('start_date');
            $table->date('end_date');
            $table->text('monday_report')->nullable();
            $table->text('tuesday_report')->nullable();
            $table->text('wednesday_report')->nullable();
            $table->text('thursday_report')->nullable();
            $table->text('friday_report')->nullable();
            $table->longText('reflection')->nullable();
            $table->longText('supervisor_comment')->nullable();
            $table->string('signature')->nullable();
            $table->enum('status', ['Approved', 'Pending'])->default('Pending');
            $table->date('approved_date')->nullable();
            $table->foreignId('approved_by_company_supervisor')->nullable()->constrained('company_supervisors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weekly_reports');
    }
};
