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
    Schema::create('doctors', function (Blueprint $table) {
        $table->increments('PK_DoctorID');
        $table->unsignedBigInteger('FK_UserID')->nullable();
        $table->string('FirstName')->nullable();
        $table->string('MiddleName')->nullable();
        $table->string('LastName')->nullable();
        $table->string('Specialization')->nullable();
        $table->string('Qualification')->nullable();
        $table->string('DepartmentName')->nullable();
        $table->string('MobileNo')->nullable();
        $table->string('AltContactNo')->nullable();
        $table->string('PinCode')->nullable();
        $table->text('City')->nullable();
        $table->text('Address')->nullable();
        $table->text('Address2')->nullable();
        $table->string('ProfileImage', length: 1000)->nullable(); 
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
