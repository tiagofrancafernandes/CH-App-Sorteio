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
        Schema::create('wallet_transactions', function (Blueprint $table) {
            $table->uuid('id')->index()->unique()->primary();
            $table->uuid('wallet_id')->index();
            $table->string('label')->nullable();
            $table->string('amount')->index();
            $table->longText('description')->nullable();
            $table->integer('type')->index(); // App\Enums\WalletTransactionType
            $table->enum('mode', ['IN', 'OUT', 'NO_ONE', 'UNKNOWN'])->index();
            $table->integer('status')->index(); // App\Enums\WalletTransactionStatu
            $table->boolean('is_a_success_status')->index(); // Se o status é um 'sucesso' como 'SUCCESS' ou 'APPROVED'
            $table->uuid('parent_transaction')->nullable()->index(); // Quando uma transação pode estar relacionada a outra como pedido de saque e aprovação de saque
            $table->json('extra_info')->nullable();
            $table->longText('log')->nullable();

            // ----------------- transaction_connector ----------------
            $table->string('transaction_connector')->index()->nullable(); // Classe que criou ou é dona da transação. Pretendo usar no futuro para identificar transações de gateways de pagamento etc
            $table->string('transaction_connector_id')->index()->nullable(); // Identificador útil para a classe que criou ou é dona da transação
            $table->json('transaction_connector_info')->nullable(); // Informações úteis para a classe que criou ou é dona da transação como resposta, corpo, ID etc
            // ----------------- transaction_connector ----------------

            $table->timestampTz('long_microtime', 8)->useCurrent()->index();

            $table->timestampsTz(8);
            $table->softDeletesTz(8);

            $table->foreign('wallet_id')->references('id')
                ->on('wallets')->onDelete('cascade');

            $table->foreign('parent_transaction')->references('id')
            ->on('wallet_transactions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wallet_transactions');
    }
};
