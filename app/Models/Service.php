<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['department','counter'];

    public function updateby()
    {
        return $this->belongsTo(User::class, 'update_by')->select('id', 'name', 'username','employee_id');
    }
    public function createby()
    {
        return $this->belongsTo(User::class, 'create_by')->select('id', 'name', 'username','employee_id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
    public function counter()
    {
        return $this->hasMany(ServiceCounter::class, 'service_id');
    }
    public function scopeStatus($query )
    {
        return $query->where('status','active');
    }
}
