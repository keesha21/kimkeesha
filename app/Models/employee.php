<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $primaryKey = 'employeeId';
    protected $fillable = ['firstName', 'middleName', 'lastName', 'gender', 'birthdate',
        'maritalStatus', 'positionId', 'hireDate', 'address', 'contactNumber',
        'qrCode', 'status'];

    public function position()
    {
        return $this->belongsTo(Position::class, 'positionId', 'positionId');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'employeeId', 'employeeId');
    }

    public function cashAdvances()
    {
        return $this->hasMany(CashAdvance::class, 'employeeId', 'employeeId');
    }

}



