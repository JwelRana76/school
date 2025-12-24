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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('bangla_name')->nullable();
            $table->string('roll');
            $table->string('reg_no');
            $table->string('unique_id')->unique();
            $table->string('class_id');
            $table->string('religion_id');
            $table->string('gender_id');
            $table->string('blood_group_id');
            $table->string('date_of_birth');
            $table->string('photo');
            $table->string('section_id')->nullable();
            $table->string('group_id')->nullable();
            $table->string('session_id');
            $table->string('father_name');
            $table->string('father_name_bangla')->nullable();
            $table->string('mother_name');
            $table->string('mother_name_bangla')->nullable();
            $table->string('father_phone')->nullable();
            $table->string('guardian')->nullable();
            $table->string('guardian_phone')->nullable();
            $table->boolean('status')->default(true)->comment('1=active/0=inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
