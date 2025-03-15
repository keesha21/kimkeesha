<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attendance', function (Blueprint $table) {
            $table->id('attendanceId');
            $table->unsignedBigInteger('employeeId');
            $table->date('attendanceDate');
            $table->dateTime('checkInTime');
            $table->string('checkInStatus');
            $table->dateTime('checkOutTime');
            $table->string('checkOutStatus');
            $table->enum('status', ['checkedIn', 'checkedOut', 'manual'])->default('manual');
            $table->decimal('regularHours', 8,2);
            $table->decimal('overTimeHours', 8,2);
            $table->timestamps();

            $table->foreign('employeeId')->references('employeeId')->on('employees')->onDelete('cascade')->onUpdate('cascade');
        });

     
        DB::table('attendance')->insert([
            [
                'employeeId' => 1, 
                'attendanceDate' => '2025-03-10',
                'checkInTime' => '2025-03-10 08:00:00',
                'checkInStatus' => 'On Time',
                'checkOutTime' => '2025-03-10 17:00:00',
                'checkOutStatus' => 'On Time',
                'status' => 'checkedOut',
                'regularHours' => 8.00,
                'overTimeHours' => 0.00
            ],
            [
                'employeeId' => 2,
                'attendanceDate' => '2025-03-10',
                'checkInTime' => '2025-03-10 08:15:00',
                'checkInStatus' => 'Late',
                'checkOutTime' => '2025-03-10 17:30:00',
                'checkOutStatus' => 'Overtime',
                'status' => 'checkedOut',
                'regularHours' => 8.00,
                'overTimeHours' => 0.50
            ],
            [
                'employeeId' => 3, 
                'attendanceDate' => '2025-03-10',
                'checkInTime' => '2025-03-10 07:45:00',
                'checkInStatus' => 'Early',
                'checkOutTime' => '2025-03-10 16:45:00',
                'checkOutStatus' => 'Early Leave',
                'status' => 'checkedOut',
                'regularHours' => 7.50,
                'overTimeHours' => 0.00
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance');
    }
};
