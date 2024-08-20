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
 * @property string|null $resource_key
 * @property string|null $resource_value
 * @property string|null $route_name
 * @property array|null $route_params
 * @property string|null $uri
 * @property mixed $password
 * @property mixed $plainPassword
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ResourcePasswordFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ResourcePassword newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResourcePassword newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResourcePassword query()
 * @method static \Illuminate\Database\Eloquent\Builder|ResourcePassword whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourcePassword whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourcePassword wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourcePassword whereResource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourcePassword whereResourceKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourcePassword whereResourceValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourcePassword whereRouteName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourcePassword whereRouteParams($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourcePassword whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourcePassword whereUri($value)
 * @mixin \Eloquent
 */
class ResourcePassword extends Model
{
    use HasFactory;

    protected $fillable = [
        'resource',
        'resource_key',
        'resource_value',
        'route_name',
        'route_params',
        'uri',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function casts(): array
    {
        return [
            'password' => 'hashed',
            'route_params' => 'array',
        ];
    }

    protected static function boot(): void
    {
        parent::boot();

        static::updating(function (self $record) {
            unset($record->plainPassword);
        });
    }

    /**
     * Get the resourceInstance
     *
     * @param bool $strict  `resourceKey` and `resourceValue` is required
     *
     * @return ?Model
     */
    public function resourceInstance(bool $strict = false): ?BelongsTo
    {
        $resourceKey = $this?->resource_key ?: null;
        $resourceValue = $this?->resource_value ?: null;

        if ($resourceValue && !$resourceKey) {
            return null;
        }

        $resource = filled($this?->resource ?: null) ? trim("{$this?->resource}") : null;
        $resourceClass = $resource && try_is_a($resource, Model::class) ? $resource : null;

        if (!$resourceClass) {
            return null;
        }

        /**
         * @var \Illuminate\Database\Eloquent\Builder $resourceQuery
         */
        $resourceQuery = $resourceClass::query();

        if (!$resourceKey) {
            return !$strict ? $resourceQuery?->first() : null;
        }

        return $resourceQuery?->where($resourceKey, '=', $resourceValue)?->first();
    }

    public static function make(
        string|Model $resource,
        null|string $resourceKey = null,
        null|string|int|bool $resourceKeyValue = null,
        null|string|int $password = null,
        null|string $routeName = null,
        null|string|int|bool|array $routeParams = null,
    ): static {
        $plainPassword = filled($password) ? "{$password}" : str()->random(6);

        /** @var static $record */
        $record = static::create([
            'resource' => is_object($resource) ? get_class($resource) : $resource,
            'resource_key' => $resourceKey,
            'resource_value' => $resourceKeyValue,
            'route_name' => $routeName,
            'route_params' => filled($routeParams) ? \Arr::wrap($routeParams) : [],
            'uri' => $routeName ? try_route($routeName, $routeParams) : null,
            'password' => Hash::make($plainPassword),
        ]);

        $record->plainPassword = $plainPassword;

        return $record;
    }

    public function newPassword(
        null|string|int $newPassword = null,
        bool $return = false,
    ): static|string {
        $newPassword = filled($newPassword) ? "{$newPassword}" : str()->random(6);

        $this->password = Hash::make($newPassword);
        $this->save();

        $this->plainPassword = $newPassword;

        return $return ? $newPassword : $this;
    }

    public function checkPassword(string $password): bool
    {
        return Hash::check($password, $this?->password);
    }
}
