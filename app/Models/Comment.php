<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;

    /**
     * @return BelongsTo
     */
    public function post():belongsTo
    {
       return $this->belongsTo(Post::class);
    }

    /**
     * @return BelongsTo
     */
    public function user():belongsTo
    {
        return $this->belongsTo(User::class);
    }
}
