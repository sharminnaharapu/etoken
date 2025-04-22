<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Display extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with    = ['service'];

    public function scopeStatus($query)
    {
        return $query->where('status', 'active');
    }
    public function updateby()
    {
        return $this->belongsTo(User::class, 'update_by')->select('id', 'name', 'username', 'employee_id');
    }
    public function createby()
    {
        return $this->belongsTo(User::class, 'create_by')->select('id', 'name', 'username', 'employee_id');
    }
    public function service()
    {
        return $this->hasMany(DisplayService::class, 'display_id');
    }
}
