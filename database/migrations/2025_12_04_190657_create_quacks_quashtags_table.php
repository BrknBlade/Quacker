<?php

use App\Models\Quack;
use App\Models\Quashtag;
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
        Schema::create('quacks_quashtags', function(Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Quack::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Quashtag::class)->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quacks_quashtags');
    }
};
