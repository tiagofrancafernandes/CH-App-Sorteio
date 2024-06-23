<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Database\Seeders\FakeHelpers\FakeWalletHelpers;

class User extends Authenticatable
{
    use HasRoles;
    use HasFactory;
    use Notifiable;
    use HasApiTokens;
    use HasUuids;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function activeWallet(): ?string
    {
        $activeWallet = $this->active_wallet;

        if (!filled($activeWallet) || !str($activeWallet)?->isUuid()) {
            return null;
        }

        return $activeWallet;
    }

    public function setActiveWallet(?string $walletId): bool
    {
        if (is_string($walletId) && !str($walletId)?->isUuid()) {
            return false;
        }

        // TODO: validar propriedade da carteira

        $this->active_wallet = $walletId;

        return boolval($this->save());
    }

    public function getWalletListAttribute()
    {
        return $this->getWalletList($this);
    }

    public static function getWalletList(User $user, ?string $currency = null) // WIP
    {
        // TODO criar wallets de verdade

        $currencies = FakeWalletHelpers::currencies();

        return cache()->remember(
            implode(',', ['wallet_list', 'user', $user?->id, $currency]),
            60,
            fn () => collect(
                array_merge(array_values($currencies), array_values($currencies)) // TODO
            )
                ->map(
                    fn ($c) => FakeWalletHelpers::fakeWallet(
                        1,
                        ['currency' => $c]
                    )->first()
                )
        );
    }
}
