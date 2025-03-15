<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class position extends Model
{
    use HasFactory;

    protected $table = 'position';
    protected $primaryKey = 'positionId';
    protected $fillable = ['positionName', 'rate'];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'positionId', 'positionId');
    }
}
