<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('work_tasks', function (Blueprint $table) {
            $table->id();
            $table->string('task_code', 30)->unique();
            $table->string('name', 150);
            $table->foreignId('worker_id')->constrained('users')->restrictOnDelete();
            $table->string('location', 150);
            $table->date('start_date');
            $table->date('deadline');
            $table->text('description')->nullable();
            $table->string('status', 30)->default('Belum Dimulai');
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('work_tasks');
    }
};
