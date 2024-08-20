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
        Schema::create('resource_passwords', function (Blueprint $table) {
            $table->id()->index();
            $table->string('resource')->index();
            $table->string('resource_key')->index()->nullable();
            $table->string('resource_value')->index()->nullable();
            $table->string('route_name')->index()->nullable();
            $table->json('route_params')->nullable();
            $table->string('uri')->index()->nullable();
            $table->string('password');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resource_passwords');
    }
};
