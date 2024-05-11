<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('players', function (Blueprint $table) {
            $table->timestamps();
            // $table->id();
            $table->uuid('id')->unique();
            $table->primary('id');
            $table->uuid('user_id'); // ->unique()
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade'); // cascade|set null

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
