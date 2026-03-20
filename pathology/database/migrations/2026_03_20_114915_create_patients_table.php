<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('patients', function (Blueprint $table) {
        $table->id();

        // Basic Info
        $table->string('name');
        $table->string('phone')->nullable();
        $table->string('email')->nullable();

        // Personal Info
        $table->integer('age')->nullable();
        $table->enum('gender', ['Male', 'Female', 'Other'])->nullable();

        // Address
        $table->text('address')->nullable();

        // Medical
        $table->text('notes')->nullable();

        // System
        $table->boolean('is_active')->default(1);

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
