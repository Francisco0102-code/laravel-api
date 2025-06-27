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
        Schema::create('caronas', function (Blueprint $table) {
            $table->id();
            $table->string('origin');
            $table->string('destination');
            $table->date('date');
            $table->time('time');
            $table->integer('available_seats'); // Campo "vagas"
            $table->unsignedBigInteger('driver_id'); // Relacionamento com o motorista
            $table->timestamps();

            // Chave estrangeira para o motorista
            $table->foreign('driver_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caronas');
    }
};