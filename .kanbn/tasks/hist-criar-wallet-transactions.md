---
created: 2024-10-11T11:55:54.535Z
updated: 2024-10-11T11:55:54.533Z
assigned: ""
progress: 0
tags: []
---

# HIST - Criar Wallet Transactions

As transações de uma carteira informam entradas e saídas de uma carteira.

As transações tem os status:
- sucesso
- falha
- cancelado
- desconhecido

Só são contabilizadas transações com status 'sucesso'.

Além do status, deve conter o 'UUID' da carteira, o 'currency' (que deve ser o mesmo da carteira), 'amount' que é o valor efetivamente e o tipo de transação.

Os tipos de transações podem ser:

ENTRADA:
- depósito
- transferência entre carteiras 
- prêmio

SAÍDA
- saque (retirada)
- transferência entre carteiras 
- pagamento (bilhete ou algum recurso interno)

Os tipos de transferência, assim como os status serão identificados por ENUMs.
