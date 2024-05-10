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
        Schema::create('ticket_groups', function (Blueprint $table) {
            $table->id();
            $table->string('currency');
            $table->dateTime('draw_date_limit');
            $table->integer('maximum_of_participants')->nullable()->index();
            $table->integer('minimum_of_participants')->index();
            $table->string('individual_ticket_price')->nullable()->index();
            $table->integer('operating_fee');
            $table->integer('operating_fee_mode');
            $table->integer('status')->index();
            $table->timestamps();
            $table->softDeletes();
            $table->index(['created_at']);
            $table->index(['updated_at']);
            $table->index(['deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_groups');
    }
};
