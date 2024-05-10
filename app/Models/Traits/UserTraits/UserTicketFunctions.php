<?php

namespace App\Models\Traits\UserTraits;

trait UserTicketFunctions
{
    public function canBuyNewTicket(): bool
    {
        /**
         * TODO: aqui irá ser feito validação da permissão depois de verificar se o usuário passaou pelas etapas abaixo:
         * - Verificação de documentação
         * - Comprovação de maioridade no país de onde o documento foi emitido
         * - Nenhuma restrição no sistema
         * - E-mail e/ou telefone confirmados
         */
        // return $this->can('ticket::can-buy-new-ticket');
        return true; // Por hora, todos podem comprar bilhetes (depois entrará a regra de validação etc)
    }

    public function canSeeBuyNewTicketButton(): bool
    {
        return true; // Por hora, todos podem ver o botão de comprar bilhetes
    }

    public function canSeeBuyNewTicketPage(): bool
    {
        return true; // Por hora, todos podem ver a página de compra de bilhetes
    }
}
