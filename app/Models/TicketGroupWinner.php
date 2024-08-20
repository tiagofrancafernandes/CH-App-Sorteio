<?php

namespace App\Models;

use App\Models\Traits\RecordHelpers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 *
 *
 * @property int $id
 * @property int $ticket_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read mixed $single_item_cache_key
 * @property-read mixed $ticket_group
 * @property-read mixed $user
 * @property-read Ticket $ticket
 * @method static \Illuminate\Database\Eloquent\Builder|TicketGroupWinner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketGroupWinner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketGroupWinner onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketGroupWinner query()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketGroupWinner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketGroupWinner whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketGroupWinner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketGroupWinner whereTicketId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketGroupWinner whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketGroupWinner withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketGroupWinner withoutTrashed()
 * @mixin \Eloquent
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
