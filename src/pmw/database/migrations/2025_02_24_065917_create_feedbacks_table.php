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
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            $table->text('revision_notes');
            $table->foreignId("user_id")
                ->nullable()
                ->references("id")
                ->on("users")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId("proposal_id")
                ->nullable()
                ->references("id")
                ->on("proposals")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedbacks');
    }
};
