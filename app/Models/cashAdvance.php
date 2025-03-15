<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cashAdvance extends Model
{
    use HasFactory;

    protected $table = 'cash_advance';
    protected $primaryKey = 'cashAdId';
    protected $fillable = ['employeeId', 'amount', 'paymentPlan', 'deductionPerPayroll',
        'balance', 'issueDate', 'status'];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employeeId', 'employeeId');
    }
}
