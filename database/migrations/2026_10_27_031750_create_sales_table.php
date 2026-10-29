<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();

            // Tanggal pengiriman atau penjualan TBS
            $table->date('sale_date')->index();

            // Periode panen selama 14 hari
            $table->date('harvest_period_start')->index();
            $table->date('harvest_period_end');

            // Informasi penjualan
            $table->string('factory_name', 150);
            $table->decimal('weight_tons', 12, 3);
            $table->decimal('price_per_kg', 12, 2);
            $table->decimal('total_amount', 15, 2);

            // Status pembayaran dari pabrik
            $table->string('status', 20)->default('Belum Lunas');

            $table->text('notes')->nullable();

            // Staf yang menginput data
            $table->foreignId('created_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
