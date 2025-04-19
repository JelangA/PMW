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
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->text('letter');
            $table->string('team_name', length: 60);
            $table->string('business_name', length: 100);
            $table->text('business_overview');
            $table->string('business_instagram', length: 50);
            $table->text('business_situation');
            $table->string('submission_funds', length: 20);
            $table->string('turnover_target', length: 20);
            $table->enum('status', ['DIUSULKAN', 'DIVERIFIKASI', 'DISETUJUI', 'LOLOS', 'VERIFIKASI GAGAL', 'DITOLAK', 'TIDAK LOLOS'])
                ->default('DIUSULKAN');
            $table->json('support_files')->nullable();
            $table->boolean('is_completed')->default(false);
            $table->foreignId("scheme_type_id")
                ->references("id")
                ->on("scheme_types")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string("nip")->nullable();
            $table->foreign("nip")
                ->references("nip")
                ->on("lectures")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string("nim_leader")->nullable();
            $table->foreign("nim_leader")
                ->references("nim")
                ->on("students")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string("nim_member_1")->nullable();
            $table->foreign("nim_member_1")
                ->references("nim")
                ->on("students")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string("nim_member_2")->nullable();
            $table->foreign("nim_member_2")
                ->references("nim")
                ->on("students")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string("nim_member_3")->nullable();
            $table->foreign("nim_member_3")
                ->references("nim")
                ->on("students")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string("nim_member_4")->nullable();
            $table->foreign("nim_member_4")
                ->references("nim")
                ->on("students")
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
        Schema::dropIfExists('proposals');
    }
};
