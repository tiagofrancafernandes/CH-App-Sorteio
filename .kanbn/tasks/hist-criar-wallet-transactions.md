---
created: 2024-10-11T11:55:54.535Z
updated: 2024-10-26T23:31:38.121Z
assigned: ""
progress: 0
tags: []
started: 2024-10-26T00:00:00.000Z
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

## Sub-tasks

- [x] Migration para wallet transactions
- [x] Model para wallet transactions
- [ ] Controller para wallet transactions
- [ ] Front de index para wallet transactions

## Comments

- author: Tiago
  date: 2024-10-26T23:30:01.727Z
  Criado model e migrations de transactions alem dos relacionamentos entre wallet e transactions.
  Criado também a factory de transaction.
  
  Ainda falta criar a controller e a tela de visão das transações.
