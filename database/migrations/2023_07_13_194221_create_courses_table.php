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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('code',250);
            $table->string('name', 250);
            $table->integer('area_id')->unsigned();
            $table->integer('duration');
            $table->string('start_date',10)->comment('DD/MM/AAAA');
            $table->string('end_date',10)->comment('DD/MM/AAAA');
            $table->integer('agent_id')->unsigned();
            $table->integer('modality_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
