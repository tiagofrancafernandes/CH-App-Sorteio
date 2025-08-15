<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use App\Enums\Currency;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 *
 * @property string $id
 * @property string $title
 * @property string|null $description
 * @property Currency $currency
 * @property string $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read string|null $balance
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\WalletTransaction> $transactions
 * @property-read int|null $transactions_count
 * @method static \Database\Factories\WalletFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet query()
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Wallet withoutTrashed()
 * @mixin \Eloquent
 */
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

    /**
     * @return HasMany
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(WalletTransaction::class, 'wallet_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function transactionsAsc(): HasMany
    {
        return $this->hasMany(WalletTransaction::class)
            ->orderBy('created_at', 'asc')
            ->orderBy('long_microtime', 'asc');
    }

    /**
     * @return HasMany
     */
    public function transactionsDesc(): HasMany
    {
        return $this->hasMany(WalletTransaction::class)
            ->orderBy('created_at', 'desc')
            ->orderBy('long_microtime', 'desc');
    }
}
