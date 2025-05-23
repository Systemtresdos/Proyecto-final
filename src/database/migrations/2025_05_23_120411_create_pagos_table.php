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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->enum('estado', ['pendiente', 'pagado', 'fallido']);
            $table->decimal('moto_total', 10, 2);
            $table->timestamp('fecha_pago')->useCurrent();
            $table->foreignId('pedido_id')->constrained('pedidos');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
