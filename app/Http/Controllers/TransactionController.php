<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;


class TransactionController extends Controller
{
  
    public function getAllEmployeeDetails()
    {
        $employees = DB::select("
            SELECT e.*, p.positionName, p.rate, 
                   a.attendanceDate, a.checkInTime, a.checkOutTime, a.status AS attendanceStatus,
                   c.amount AS cashAdvanceAmount, c.balance AS cashAdvanceBalance, c.status AS cashAdvanceStatus
            FROM employees e
            LEFT JOIN position p ON e.positionId = p.positionId
            LEFT JOIN attendance a ON e.employeeId = a.employeeId
            LEFT JOIN cash_advance c ON e.employeeId = c.employeeId
            ORDER BY e.employeeId
        ");

        return response()->json(['success' => true, 'data' => $employees]);
    }
  

    public function getEmployeeDetails()
    {
        $employees = DB::table('employees as e')
            ->select(
                'e.*',
                'p.positionName', 
                'p.rate', 
                'a.attendanceDate', 
                'a.checkInTime', 
                'a.checkOutTime', 
                'a.status as attendanceStatus',
                'c.amount as cashAdvanceAmount', 
                'c.balance as cashAdvanceBalance', 
                'c.status as cashAdvanceStatus'
            )
            ->leftJoin('position as p', 'e.positionId', '=', 'p.positionId')
            ->leftJoin('attendance as a', 'e.employeeId', '=', 'a.employeeId')
            ->leftJoin('cash_advance as c', 'e.employeeId', '=', 'c.employeeId')
            ->orderBy('e.employeeId')
            ->get();

        return response()->json(['success' => true, 'data' => $employees]);
    }


    public function getAllDetails()
    {
        $employees = Employee::with(['position', 'attendances', 'cashAdvances'])->get();

        return response()->json([
            'success' => true,
            'data' => $employees
        ]);
    }

    


   

    public function getDetails()
    {
        $employees = Employee::with([
            'position' => function ($q) {
                $q->select('*'); 
            },
            'attendances' => function ($q) {
                $q->select('*');
            },
            'cashAdvances' => function ($q) {
                $q->select('*'); 
            }
        ])->get();

        return response()->json([
            'success' => true,
            'employees' => $employees
        ], 200);
    }

    
}
