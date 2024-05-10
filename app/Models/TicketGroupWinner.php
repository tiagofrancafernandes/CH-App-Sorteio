<?php

namespace App\Models;

use App\Models\Traits\RecordHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property-read string $singleItemCacheKey
 * @method ?Ticket $ticket
 * @method ?TicketGroup $ticketGroup
 */
class TicketGroupWinner extends Model
{
    use HasFactory;
    use SoftDeletes;
    use RecordHelpers;
    // use Traits\OnlyTenantScopeTrait; // Only Tenant
    // use Traits\OnlyGlobalScopeTrait; // Only Global (not tenant)

    public $table = 'ticket_group_winners';

    protected $fillable = [
        'ticket_id',
    ];

    protected $casts = [
        //
    ];

    protected $appends = [
        //
    ];

    /**
     * Get the ticket associated with the TicketGroupWinner
     *
     * @return BelongsTo
     */
    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class);
    }

    /**
     * Get the user associated with the TicketGroupWinner
     *
     * @return ?User
     */
    public function user(): ?User
    {
        return $this->ticket?->user;
    }

    /**
     * Get the user associated with the TicketGroupWinner
     *
     * @return ?TicketGroup
     */
    public function ticketGroup(): ?TicketGroup
    {
        return $this->ticket?->ticketGroup;
    }

    public function getUserAttribute()
    {
        return $this->user();
    }

    public function getTicketGroupAttribute()
    {
        return $this->ticketGroup();
    }
}
