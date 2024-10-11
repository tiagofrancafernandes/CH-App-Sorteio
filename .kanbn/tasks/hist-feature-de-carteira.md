---
created: 2024-10-11T11:37:51.945Z
updated: 2024-10-11T11:48:19.913Z
assigned: ""
progress: 0
tags:
  - card-pai
  - backend
  - frontend
  - historia
---

# HIST - Feature de Carteira

A carteira (wallet) tem:

UUID: uuid|unique (gerado automaticamente) - NÃO alterável
user_id: usuário dono da carteira - NÃO alterável
title: obrigatório|string - alterável
description: string - alterável
balance (isso é um atributo dinâmico e é o resultado da soma das tranasações com status SUCCESS)
currency: obrigatório|string|ISO - NÃO alterável

Uma carteira não é excluível (dá pra inativar/ocultar)

## Sub-tasks

- [ ] Criar model Wallet
- [ ] Criar factory de Wallet
- [ ] Atualizar controller de wallet
