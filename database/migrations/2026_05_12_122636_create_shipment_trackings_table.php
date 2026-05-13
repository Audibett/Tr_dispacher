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
        Schema::create('shipment_trackings', function (Blueprint $table) {

    $table->id();

    $table->foreignId('assignment_id')
          ->constrained()
          ->onDelete('cascade');

    $table->foreignId('driver_id')
          ->constrained('users')
          ->onDelete('cascade');

    $table->string('current_location');

    $table->enum('status', [
        'assigned',
        'picked_up',
        'in_transit',
        'delivered'
    ]);

    $table->text('remarks')->nullable();

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipment_trackings');
    }
};
