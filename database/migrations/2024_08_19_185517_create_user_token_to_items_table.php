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
        Schema::create('user_token_to_items', function (Blueprint $table) {
            $table->id()->index();
            $table->string('resource')->index();
            $table->string('resource_key1')->index()->nullable();
            $table->string('resource_key1_value')->index()->nullable();
            $table->string('resource_key2')->index()->nullable();
            $table->string('resource_key2_value')->index()->nullable();
            $table->string('token')->index();
            $table->timestamp('expires_at')->index()->nullable();
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_token_to_items');
    }
};
