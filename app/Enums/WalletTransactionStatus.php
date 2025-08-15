<?php

namespace App\Enums;

enum WalletTransactionStatus: int
{
    case SUCCESS = 100;
    case APPROVED = 150;
    case AWAITING = 300;
    case UNDER_ANALYSIS = 350;
    case CANCELED = 400;
    case REJECTED = 450;
    case SUSPENDED = 500;
    case FAILURE = 700;
    case UNKNOWN = 999;

    public function isSuccessStatus(): bool
    {
        return static::isSuccess($this);
    }

    public static function isSuccess(null|int|string|WalletTransactionStatus $status): bool
    {
        /** @var WalletTransactionStatus */
        $enum = static::tryGetEnum($status);

        return match ($enum) {
            static::SUCCESS, static::APPROVED => true,
            default => false,
        };
    }

    public static function tryGetEnum(
        null|int|string|WalletTransactionStatus $enum,
    ): static {
        /** @var ?WalletTransactionStatus */
        $enum = is_a($enum, static::class) ? $enum : static::tryFrom((int) $enum);

        return $enum ?? static::UNKNOWN;
    }
}
