<?php

namespace App\Models;

use App\Enums\WalletTransactionStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\AsStringable;
use App\Enums\WalletTransactionType;
use App\Enums\WalletTransactionMode;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 *
 * @property AsStringable $label
 * @property AsStringable $description
 * @property WalletTransactionType $type
 * @property WalletTransactionMode $mode
 * @property WalletTransactionStatus $status
 * @property AsStringable $log
 * @property AsStringable $transaction_connector
 * @property-read Wallet|null $wallet
 * @method static \Database\Factories\WalletTransactionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|WalletTransaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WalletTransaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WalletTransaction onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|WalletTransaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|WalletTransaction withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|WalletTransaction withoutTrashed()
 * @extends \Illuminate\Database\Eloquent\Model<\App\Models\WalletTransaction>
 * @mixin \Eloquent
 */
class WalletTransaction extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasUuids;

    protected $dateFormat = 'U';

    protected $fillable = [
        'wallet_id',
        'label',
        'amount',
        'description',
        'type',
        'mode',
        'status',
        'is_a_success_status',
        'parent_transaction',
        'extra_info',
        'log',
        'long_microtime',
        'transaction_connector',
        'transaction_connector_id',
        'transaction_connector_info',
    ];

    protected $casts = [
        'label' => AsStringable::class,
        'amount' => 'double',
        'description' => AsStringable::class,
        'type' => WalletTransactionType::class,
        'mode' => WalletTransactionMode::class,
        'status' => WalletTransactionStatus::class,
        'is_a_success_status' => 'boolean',
        'extra_info' => AsCollection::class,
        'log' => AsStringable::class,
        'transaction_connector' => AsStringable::class,
        'transaction_connector_info' => AsCollection::class,
        // 'long_microtime' => 'timestamp:6',
        // 'long_microtime' => 'timestamp',
        'long_microtime' => 'datetime:U',
        // 'created_at' => 'datetime:U',
        // 'updated_at' => 'datetime:U',
        // 'deleted_at' => 'datetime:U',
    ];

    public function uniqueIds()
    {
        return [
            $this->getKeyName(),
        ];
    }

    /**
     * Get the wallet that owns the WalletTransaction
     *
     * @return BelongsTo
     */
    public function wallet(): BelongsTo
    {
        return $this->belongsTo(Wallet::class, 'wallet_id', 'id');
    }
}
