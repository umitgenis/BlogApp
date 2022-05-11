<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;

    /**
     * @return BelongsTo
     */
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeContentSummary($query)
    {
        return $query->addSelect(DB::raw('left(content, 200) as content'));
    }

    /**
     * @return HasMany
     */
    public function comments():hasMany
    {
        return $this->hasMany(Comment::class);
    }
}
