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
            $table->string('brand', 45);
            $table->string('model', 55);
            $table->string('year', 45);
            $table->string('nit', 45);
            $table->string('type', 55);
            $table->string('plate', 55);




            $table->unsignedBigInteger('deliverie_id'); // bigint(20) unsigned
            $table->foreign('deliverie_id')->references('id')->on('deliveries')->onDelete('cascade');
            
            $table->timestamps();
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
