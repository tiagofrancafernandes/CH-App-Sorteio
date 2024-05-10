<?php

namespace App\Models;

use App\Enums\TicketGroupOperatingFreeMode;
use App\Enums\TicketGroupStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

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
