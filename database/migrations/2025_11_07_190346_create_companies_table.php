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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name', 45);
            $table->string('legal_representative_name', 55)->nullable();
            $table->string('legal_representative_lastname', 55)->nullable();
            $table->string('nit', 55) ->unique(); 
            $table->string('person_type', 55);
            $table->string('legal_name_company', 55)->nullable();
            $table->string('legal_representative_email', 55)->unique(); 

            $table->unsignedBigInteger('user_id'); // bigint(20) unsigned
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
