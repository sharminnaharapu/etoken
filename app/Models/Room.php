<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function scopeStatus($query )
    {
        return $query->where('status','active');
    }
    public function updateby()
    {
        return $this->belongsTo(User::class, 'update_by')->select('id', 'name', 'username','employee_id');
    }
    public function createby()
    {
        return $this->belongsTo(User::class, 'create_by')->select('id', 'name', 'username','employee_id');
    }
}
