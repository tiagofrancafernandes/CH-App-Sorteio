<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property-read string $singleItemCacheKey
 * @property-read ?Ticket $ticket
 * @property-read ?TicketGroup $ticketGroup
 */
class Ticket extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'number',
        'ticket_group_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ticketGroup()
    {
        return $this->belongsTo(TicketGroup::class);
    }
}
