<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attendance extends Model
{
    use HasFactory;

    protected $table = 'attendance';
    protected $primaryKey = 'attendanceId';
    protected $fillable = ['employeeId', 'attendanceDate', 'checkInTime', 'checkInStatus',
        'checkOutTime', 'checkOutStatus', 'status', 'regularHours', 'overTimeHours'];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employeeId', 'employeeId');
    }
}
