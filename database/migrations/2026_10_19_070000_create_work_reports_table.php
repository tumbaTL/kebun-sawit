<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('work_reports', function (Blueprint $table) {
            $table->id();
            $table->string('report_code', 40)->unique();
            $table->foreignId('worker_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('work_task_id')->nullable()->constrained('work_tasks')->nullOnDelete();
            // Snapshot tugas agar riwayat tetap terbaca bila tugas aslinya dihapus.
            $table->string('task_name', 150);
            $table->string('task_location', 150)->nullable();
            $table->date('work_date');
            $table->text('notes');
            // Berisi path relatif file di storage/app/private, bukan isi foto.
            $table->json('photo_paths')->nullable();
            $table->string('status_verification', 30)->default('Menunggu');
            $table->timestamps();

            $table->index(['worker_id', 'work_date']);
            $table->index('status_verification');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('work_reports');
    }
};
