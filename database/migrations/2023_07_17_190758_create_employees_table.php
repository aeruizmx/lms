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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('names',250);
            $table->string('first_ surname',250);
            $table->string('second_ surname',250);
            $table->string('curp',250);
            $table->string('email', 250)->nullable();
            $table->integer('city_id');
            $table->integer('position_id');
            $table->integer('occupation_id');
            $table->integer('location_id');
            $table->integer('study_id');
            $table->integer('study_document_id');
            $table->integer('institution_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
