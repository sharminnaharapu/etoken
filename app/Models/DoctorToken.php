<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorToken extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['createby','updateby','department','service','room'];
    public function createby()
    {
        return $this->belongsTo(User::class, 'create_by')->select('id', 'name', 'username','employee_id');
    }
    public function updateby() {
        return $this->belongsTo(User::class, 'update_by')->select('id', 'name', 'username', 'employee_id');
    }
    public function atendby() {
        return $this->belongsTo(User::class, 'atend_by')->select('id', 'name', 'username', 'employee_id');
    }
    public function doctor() {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function department() {
        return $this->belongsTo(Department::class, 'department_id');
    }
    public function service() {
        return $this->belongsTo(Service::class, 'service_id')->select('id', 'name', 'status', 'image');
    }
    public function room() {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
