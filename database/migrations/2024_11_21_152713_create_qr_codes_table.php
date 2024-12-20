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
	    Schema::create('qr_codes', function (Blueprint $table) {
		    $table->id('qr_code_id'); // Primary Key
		    $table->enum('qr_code_type', ['check_in', 'check_out']); // Tipe QR
		    $table->unsignedBigInteger('workshop_id'); // Foreign Key ke workshops
		    $table->string('qr_code', 255); // URL QR Code
		    $table->timestamps(); // created_at dan updated_at
		    
		    // Foreign Key Constraint
		    $table->foreign('workshop_id')->references('workshop_id')->on('workshops')->cascadeOnDelete();
	    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qr_codes');
    }
};
