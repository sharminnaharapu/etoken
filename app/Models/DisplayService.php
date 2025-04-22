<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisplayService extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['service'];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

}
