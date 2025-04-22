<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CounterTokenCall extends Model
{
    use HasFactory;
    protected $guarded = [];

    /**
     * Get the counter that owns the CounterTokenCall
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function counter(): BelongsTo
    {
        return $this->belongsTo(Counter::class, 'counter_id', 'id');
    }

}
