<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('maintenance_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('schedule_code', 30)->unique();
            $table->string('activity', 150);
            $table->date('schedule_date');
            $table->string('location', 150);
            $table->foreignId('worker_id')->constrained('users')->restrictOnDelete();
            $table->string('status', 30)->default('Terjadwal');
            $table->text('notes')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();

            $table->index(['schedule_date', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('maintenance_schedules');
    }
};
