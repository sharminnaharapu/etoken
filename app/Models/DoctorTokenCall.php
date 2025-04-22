<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorTokenCall extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with    = ['doctor', 'department', 'room'];

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id')->select('id', 'name', 'status', 'image');
    }
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
