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
        Schema::table('users', function (Blueprint $table) {
            $table->string('selected_theme')->nullable()->after('onboarding_status');
            $table->string('store_domain')->nullable()->after('selected_theme');
            $table->string('store_name')->nullable()->after('store_domain');
            $table->text('store_description')->nullable()->after('store_name');
            $table->string('store_logo')->nullable()->after('store_description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['selected_theme', 'store_domain', 'store_name', 'store_description', 'store_logo']);
        });
    }
};
