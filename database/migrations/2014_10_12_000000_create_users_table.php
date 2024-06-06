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
        Schema::create('tb_staff', function (Blueprint $table) {
            $table->id();
            $table->string('NAMA_STAFF');
            $table->string('USERNAME');
            $table->string('EMAIL')->unique();
            $table->string('PASSWORD');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_staff');
    }
};
