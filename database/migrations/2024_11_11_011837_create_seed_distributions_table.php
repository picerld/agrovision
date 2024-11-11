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
        Schema::create('seed_distributions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_id')->nullable();
            $table->unsignedBigInteger('type_of_seed')->nullable();
            $table->integer('seed_qty');
            $table->string('unit', 20);
            $table->date('date');
            $table->string('pic', 50);
            $table->timestamps();

            $table->foreign('school_id')->references('id')->on('schools')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('type_of_seed')->references('id')->on('commodities')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seed_distributions');
    }
};
