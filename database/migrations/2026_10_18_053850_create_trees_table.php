<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('trees', function (Blueprint $table) {
            $table->id();

            // Identitas unik setiap pohon
            $table->string('tree_code', 50)->unique();

            // Pohon terhubung ke blok kebun
            $table->foreignId('block_id')
                ->constrained('blocks')
                ->restrictOnDelete();

            // Umur pohon dalam bulan
            $table->unsignedSmallInteger('age_months')->default(0);

            // Contoh kondisi: Sehat, Urgent, Pemulihan
            $table->string('condition', 40)->default('Sehat');

            // Status perawatan pohon
            $table->string('maintenance_status', 50)
                ->default('Belum dijadwalkan');

            // Koordinat pohon
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();

            $table->date('planted_at')->nullable();
            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trees');
    }
};
