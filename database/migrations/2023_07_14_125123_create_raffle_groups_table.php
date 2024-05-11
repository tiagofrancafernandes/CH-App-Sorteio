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
        Schema::create('raffle_groups', function (Blueprint $table) {
            $table->timestamps();
            $table->uuid('id')->unique();
            $table->primary('id');
            $table->integer('max_players')->index();
            $table->integer('status')->index();
            $table->datetime('raffle_date')->nullable()->index();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('raffle_groups');
    }
};
