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
        Schema::table('locations', function (Blueprint $table) {
            $table->string('location', 255)->after('identifier');
            $table->string('address',255)->after('location');
            $table->integer('zone_id')->unsigned()->after('address');
            $table->integer('city_id')->unsigned()->after('zone_id');
            $table->integer('state_id')->unsigned()->after('city_id');
            $table->integer('cp')->unsigned()->after('state_id');
            $table->integer('establishment_id')->after('cp');
            $table->integer('employer_registration_id')->after('establishment_id');
            $table->boolean('active')->default(false)->after('employer_registration_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('locations', function (Blueprint $table) {
            $table->dropColumn('location');
            $table->dropColumn('address');
            $table->dropColumn('zone_id');
            $table->dropColumn('city_id');
            $table->dropColumn('state_id');
            $table->dropColumn('cp');
            $table->dropColumn('establishment_id');
            $table->dropColumn('employer_registration_id');
            $table->dropColumn('active');
        });
    }
};
