<?php

namespace App\Models;

use App\Enums\TicketGroupOperatingFreeMode;
use App\Enums\TicketGroupStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

/**
 *
 *
 * @property int $id
 * @property string $currency
 * @property string $draw_date_limit
 * @property int|null $maximum_of_participants
 * @property int $minimum_of_participants
 * @property string|null $individual_ticket_price
 * @property int $operating_fee
 * @property TicketGroupOperatingFreeMode $operating_fee_mode
 * @property TicketGroupStatus $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read mixed $group_name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Ticket> $tickets
 * @property-read int|null $tickets_count
 * @method static \Database\Factories\TicketGroupFactory factory($count = null, $state = [])
 * @method static Builder|TicketGroup newModelQuery()
 * @method static Builder|TicketGroup newQuery()
 * @method static Builder|TicketGroup onlyTrashed()
 * @method static Builder|TicketGroup openGroups(?int $afterMinutes = null)
 * @method static Builder|TicketGroup query()
 * @method static Builder|TicketGroup whereCreatedAt($value)
 * @method static Builder|TicketGroup whereCurrency($value)
 * @method static Builder|TicketGroup whereDeletedAt($value)
 * @method static Builder|TicketGroup whereDrawDateLimit($value)
 * @method static Builder|TicketGroup whereId($value)
 * @method static Builder|TicketGroup whereIndividualTicketPrice($value)
 * @method static Builder|TicketGroup whereMaximumOfParticipants($value)
 * @method static Builder|TicketGroup whereMinimumOfParticipants($value)
 * @method static Builder|TicketGroup whereOperatingFee($value)
 * @method static Builder|TicketGroup whereOperatingFeeMode($value)
 * @method static Builder|TicketGroup whereStatus($value)
 * @method static Builder|TicketGroup whereUpdatedAt($value)
 * @method static Builder|TicketGroup withTrashed()
 * @method static Builder|TicketGroup withoutTrashed()
 * @mixin \Eloquent
 */
class TicketGroup extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'currency',
        'draw_date_limit',
        'maximum_of_participants',
        'minimum_of_participants',
        'individual_ticket_price',
        'operating_fee',
        'operating_fee_mode',
        'status',
    ];

    protected $casts = [
        'status' => TicketGroupStatus::class,
        'operating_fee_mode' => TicketGroupOperatingFreeMode::class,
    ];

    protected $appends = [
        'groupName',
    ];

    public function getGroupNameAttribute()
    {
        return "{$this->id} alguma coisa";
    }

    /**
     * Get all of the tickets for the TicketGroup
     *
     * @return HasMany
     */
    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class, 'ticket_group_id', 'id');
    }

    public function scopeOpenGroups(Builder $query, ?int $afterMinutes = null)
    {
        $afterMinutes = ($afterMinutes ?? 0) >= 2 ? $afterMinutes : 2;

        return $query->where('status', TicketGroupStatus::OPEN_FOR_ENTRY)
            ->where('draw_date_limit', '>', now()->addMinutes($afterMinutes));
    }
}
