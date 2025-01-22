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
        Schema::create('employes', function (Blueprint $table) {
            $table->id('employee_id');
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->date('date_of_birth');
            $table->enum('gender', ['male', 'female']);
            $table->string('email', 100)->unique();
            $table->string('address', 255);
            $table->date('hire_date');
            $table->date('termination_date')->nullable();
            $table->bigInteger('division_id')->unsigned();
            $table->bigInteger('job_id')->unsigned();
            $table->foreign('division_id')->references('division_id')->on('divisions')->onDelete('cascade');
            $table->foreign('job_id')->references('job_id')->on('employes_jobs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employes');
    }
};
