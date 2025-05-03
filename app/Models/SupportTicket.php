<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SupportTicket extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     */
    protected $table = 'supporttickets';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'subject',
        'message',
        'email',
        'status',
        'priority',
        'closed_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'closed_at' => 'datetime',
    ];

    /**
     * Get the user that created the support ticket.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope a query to only include tickets of a given status.
     */
    public function scopeStatus($query, string $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope a query to only include tickets with a given priority.
     */
    public function scopePriority($query, string $priority)
    {
        return $query->where('priority', $priority);
    }

    /**
     * Status options.
     *
     * @return string[]
     */
    public static function statuses(): array
    {
        return ['open', 'pending', 'closed'];
    }

    /**
     * Priority options.
     *
     * @return string[]
     */
    public static function priorities(): array
    {
        return ['low', 'normal', 'high'];
    }
}
