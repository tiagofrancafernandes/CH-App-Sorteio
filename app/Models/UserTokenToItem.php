<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Hash;

/**
 *
 *
 * @property int $id
 * @property string $resource
 * @property string|null $resource_key1
 * @property string|null $resource_key1_value
 * @property string|null $resource_key2
 * @property string|null $resource_key2_value
 * @property string $token
 * @property \Illuminate\Support\Carbon|null $expires_at
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read User $user
 * @method static \Database\Factories\UserTokenToItemFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|UserTokenToItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserTokenToItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserTokenToItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserTokenToItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTokenToItem whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTokenToItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTokenToItem whereResource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTokenToItem whereResourceKey1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTokenToItem whereResourceKey1Value($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTokenToItem whereResourceKey2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTokenToItem whereResourceKey2Value($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTokenToItem whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTokenToItem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTokenToItem whereUserId($value)
 * @mixin \Eloquent
 */
class UserTokenToItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'resource',
        'resource_key1',
        'resource_key1_value',
        'resource_key2',
        'resource_key2_value',
        'token',
        'expires_at',
        'user_id',
    ];

    protected $hidden = [
        'token',
        'plainToken',
    ];

    public function casts(): array
    {
        return [
            // 'token' => 'hashed',
            'expires_at' => 'datetime',
        ];
    }

    protected static function boot(): void
    {
        parent::boot();

        static::updating(function (self $record) {
            unset($record->plainToken);
        });
    }

    /**
     * Get the user that owns the UserTokenToItem
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public static function generateToken(
        null|string $tokenEntropy = null,
        null|string $tokenPrefix = null,
    ): string {
        return sprintf(
            '%s%s%s',
            $tokenPrefix ?? config('sanctum.token_prefix', ''),
            $tokenEntropy ??= \Str::random(40),
            hash('crc32b', $tokenEntropy)
        );
    }

    public function regenerateToken(
        bool $return = false,
        null|\DateTimeInterface|bool|string $expiresAt = null,
        null|string $tokenEntropy = null,
        null|string $tokenPrefix = null,
    ): static|string {
        $newToken = static::generateToken($tokenEntropy, $tokenPrefix);

        if (!is_null($this->expires_at) || !is_null($expiresAt)) {
            $expiresAt = $expiresAt === false ? null : try_parse_date($expiresAt) ?? now()->addSeconds(24 * 60 * 60);
        }

        $this->token = Hash::make($newToken);
        $this->expires_at = $expiresAt;
        $this->save();

        $this->plainToken = $newToken;

        return $return ? $newToken : $this;
    }

    public static function make(
        User $user,
        string $resource,
        null|string $resourceKey1 = null,
        null|string|int|bool $resourceKey1Value = null,
        null|string $resourceKey2 = null,
        null|string|int|bool $resourceKey2Value = null,
        null|\DateTimeInterface|bool|string $expiresAt = null,
        null|string|int $selfTokenString = null,
    ): static {
        $expiresAt = $expiresAt === false ? null : try_parse_date($expiresAt) ?? now()->addSeconds(24 * 60 * 60);
        $plainToken = $selfTokenString ?? static::generateToken();

        /** @var static $record */
        $record = static::create([
            'resource' => $resource,
            'resource_key1' => $resourceKey1,
            'resource_key1_value' => $resourceKey1Value,
            'resource_key2' => $resourceKey2,
            'resource_key2_value' => $resourceKey2Value,
            'token' => Hash::make($plainToken),
            'expires_at' => $expiresAt,
            'user_id' => $user?->id,
        ]);

        $record->plainToken = $plainToken;

        return $record;
    }
}
