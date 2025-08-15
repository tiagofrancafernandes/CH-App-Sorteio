<?php

namespace App\Enums;

enum Currency: string
{
    case BRL = 'BRL';
    case USD = 'USD';
    case EUR = 'EUR';

    public function info(): array
    {
        return match ($this) {
            static::BRL => [
                'code' => 'BRL',
                'sign' => 'R$',
                'locale' => 'pt_BR',
                'name' => $this?->name,
                'value' => $this?->value,
                'enum' => $this,
            ],
            static::USD => [
                'code' => 'USD',
                'sign' => '$',
                'locale' => 'en_US',
                'name' => $this?->name,
                'value' => $this?->value,
                'enum' => $this,
            ],
            static::EUR => [
                'code' => 'EUR',
                'sign' => '€',
                'locale' => 'en',
                'name' => $this?->name,
                'value' => $this?->value,
                'enum' => $this,
            ],
        };
    }

    public static function currencies(bool $toArray = false): \Illuminate\Support\Collection|array
    {
        $cases = collect(static::cases())?->mapWithKeys(
            fn (Currency $e) => [$e?->value => fluent($e?->info())]
        );

        return $toArray ? $cases?->toArray() : $cases;
    }
}
