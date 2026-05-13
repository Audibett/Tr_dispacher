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
        Schema::create('pod_uploads', function (Blueprint $table) {

    $table->id();

    $table->foreignId('assignment_id')
          ->constrained()
          ->onDelete('cascade');

    $table->foreignId('uploaded_by')
          ->constrained('users')
          ->onDelete('cascade');

    $table->string('pod_image');

    $table->text('remarks')->nullable();

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pod_uploads');
    }
};
