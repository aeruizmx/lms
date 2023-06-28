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
        Schema::table('polls', function (Blueprint $table) {
            $table->boolean('status')->default(0)->after('description');
        });
        Schema::table('questions', function (Blueprint $table) {
            $table->boolean('status')->default(0)->after('question');
        });
        Schema::table('answers', function (Blueprint $table) {
            $table->boolean('status')->default(0)->after('value');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('polls', function (Blueprint $table) {
            $table->dropColumn('status');
        });
        Schema::table('questions', function (Blueprint $table) {
            $table->dropColumn('status');
        });
        Schema::table('answers', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
