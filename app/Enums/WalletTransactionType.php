<?php

namespace App\Enums;

enum WalletTransactionType: int
{
    case IN_GENERAL_TYPE = 100;
    case IN_DEPOSIT = 110;
    case IN_TRANSFER_BETWEEN_WALLETS = 120;
    case IN_AWARD = 130;
    case IN_BONUS = 140;
    case IN_REFUND = 150;

    case OUT_GENERAL_TYPE = 500;
    case OUT_WITHDRAWAL = 510;
    case OUT_TRANSFER_BETWEEN_WALLETS = 520;
    case OUT_INTERNAL_PAYMENT = 530;
    case OUT_3RD_PAYMENT = 540;

    case NO_ONE = 888;
    case UNKNOWN = 999;

    public function getMode(): WalletTransactionMode
    {
        return match ($this) {
            static::IN_GENERAL_TYPE, static::IN_DEPOSIT, static::IN_TRANSFER_BETWEEN_WALLETS,
            static::IN_AWARD, static::IN_BONUS, static::IN_REFUND => WalletTransactionMode::IN,
            static::OUT_GENERAL_TYPE, static::OUT_WITHDRAWAL, static::OUT_TRANSFER_BETWEEN_WALLETS,
            static::OUT_INTERNAL_PAYMENT, static::OUT_3RD_PAYMENT => WalletTransactionMode::OUT,
            static::NO_ONE => WalletTransactionMode::NO_ONE,
            static::UNKNOWN => WalletTransactionMode::UNKNOWN,
            default => WalletTransactionMode::UNKNOWN,
        };
    }

    public static function tryGetMode(
        null|int|string|WalletTransactionType $type,
    ): WalletTransactionMode {
        /** @var ?WalletTransactionType */
        $type = is_a($type, static::class) ? $type : static::tryFrom((int) $type);

        return $type?->getMode() ?? WalletTransactionMode::UNKNOWN;
    }

    public static function tryGetEnum(
        null|int|string|WalletTransactionType $enum,
    ): static {
        /** @var ?WalletTransactionType */
        $enum = is_a($enum, static::class) ? $enum : static::tryFrom((int) $enum);

        return $enum ?? static::UNKNOWN;
    }
}
