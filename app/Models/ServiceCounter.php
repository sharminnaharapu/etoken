<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCounter extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['counter'];

    public function counter()
    {
        return $this->belongsTo(counter::class, 'counter_id');
    }

}
