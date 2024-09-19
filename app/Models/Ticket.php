<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'category_id',
        'status_id',
        'priority_id',
        'agent_id',
        'closed_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
