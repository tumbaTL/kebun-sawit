<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('work_reports', function (Blueprint $table) {
            $table->decimal('harvest_tons', 10, 3)
                ->nullable()
                ->after('notes');
        });
    }

    public function down(): void
    {
        Schema::table('work_reports', function (Blueprint $table) {
            $table->dropColumn('harvest_tons');
        });
    }
};
