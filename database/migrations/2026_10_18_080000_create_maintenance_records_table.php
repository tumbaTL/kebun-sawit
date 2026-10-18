<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('maintenance_records', function (Blueprint $table) {
            $table->id();
            $table->string('maintenance_code', 40)->unique();
            $table->foreignId('tree_id')->constrained('trees')->restrictOnDelete();
            $table->foreignId('worker_id')->constrained('users')->restrictOnDelete();
            $table->string('maintenance_type', 50);
            $table->date('maintenance_date');
            $table->text('notes')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();

            $table->index(['maintenance_date', 'maintenance_type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('maintenance_records');
    }
};
