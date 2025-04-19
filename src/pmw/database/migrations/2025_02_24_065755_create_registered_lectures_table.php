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
        Schema::create('registered_lectures', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")
                ->references("id")
                ->on("users")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string("nip")->nullable();
            $table->foreign("nip")
                ->references("nip")
                ->on("lectures")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registered_lectures');
    }
};
