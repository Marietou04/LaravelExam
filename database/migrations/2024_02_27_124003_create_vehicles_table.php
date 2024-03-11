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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->date('date_achat');
            $table->integer('km_defaut');
            $table->enum('type', ['taxi', 'mini_bus','camion','calando'])->default('taxi');
            $table->string('matricule');
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->enum('status', ['disponible', 'en panne','en service'])->default('en service');
            $table->timestamps();

            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
