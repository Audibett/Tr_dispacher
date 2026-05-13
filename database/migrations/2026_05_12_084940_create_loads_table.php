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
       Schema::create('loads', function (Blueprint $table) {

    $table->id();

    $table->foreignId('shipper_id')->constrained('users')->onDelete('cascade');

    $table->string('pickup_location');

    $table->string('delivery_location');

    $table->text('load_description');

    $table->string('weight');

    $table->enum('status', [
        'pending',
        'approved',
        'rejected',
        'in_transit',
        'delivered'
    ])->default('pending');

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loads');
    }
};
