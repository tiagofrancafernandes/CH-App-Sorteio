<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use App\Enums\Currency;

class Wallet extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasUuids;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'currency',
    ];

    protected $casts = [
        'currency' => Currency::class,
    ];

    public function uniqueIds()
    {
        return [
            $this->getKeyName(),
        ];
    }

    /**
     * //TODO: Aqui fazer o relacionamento com 'transactions' e somar valores com status 'concluido'
     */
    public function balance(): string
    {
        return (rand(0, 100) * 5) . '.' . (rand(0, 9) . rand(0, 9));
    }

    public function getBalanceAttribute(): ?string
    {
        return $this?->balance();
    }
}
