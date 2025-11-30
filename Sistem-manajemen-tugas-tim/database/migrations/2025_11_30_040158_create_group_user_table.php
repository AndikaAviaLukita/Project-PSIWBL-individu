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
    Schema::create('groups', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('description')->nullable();
        $table->foreignId('created_by')->constrained('users')->onDelete('cascade'); // Siapa admin pembuatnya
        $table->timestamps();
    });

    Schema::create('group_user', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('group_id')->constrained()->onDelete('cascade');
        $table->timestamps();
        
        // Mencegah duplikasi (User tidak bisa join grup yang sama 2x)
        $table->unique(['user_id', 'group_id']);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::dropIfExists('group_user'); // hapus anak
    Schema::dropIfExists('groups');     // hapus induk
}
};
