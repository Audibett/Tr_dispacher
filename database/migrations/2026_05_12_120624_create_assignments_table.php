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
        Schema::create('assignments', function (Blueprint $table) {

    $table->id();

    $table->foreignId('load_id')->constrained()->onDelete('cascade');

    $table->foreignId('truck_id')->constrained()->onDelete('cascade');

    $table->foreignId('driver_id')->constrained('users')->onDelete('cascade');

    $table->enum('status', [
        'assigned',
        'picked_up',
        'in_transit',
        'delivered'
    ])->default('assigned');

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
