<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;

    /**
     * The user that belong to the Role
     * @return BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
