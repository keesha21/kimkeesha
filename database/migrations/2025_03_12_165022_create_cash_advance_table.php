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
        Schema::create('cash_advance', function (Blueprint $table) {
            $table->id('cashAdId');
            $table->unsignedBigInteger('employeeId');
            $table->decimal('amount', 8,2);
            $table->integer('paymentPlan'); 
            $table->decimal('deductionPerPayroll', 8,2);
            $table->decimal('balance', 8,2);
            $table->dateTime('issueDate');
            $table->enum('status', ['unpaid', 'paid'])->default('paid');
            $table->timestamps();

            $table->foreign('employeeId')->references('employeeId')->on('employees')->onDelete('cascade')->onUpdate('cascade');
        });

      
        DB::table('cash_advance')->insert([
            [
                'employeeId' => 1, 
                'amount' => 5000.00,
                'paymentPlan' => 5,
                'deductionPerPayroll' => 1000.00,
                'balance' => 1000.00,
                'issueDate' => '2025-03-01 10:00:00',
                'status' => 'unpaid',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'employeeId' => 2, 
                'amount' => 3000.00,
                'paymentPlan' => 3,
                'deductionPerPayroll' => 1000.00,
                'balance' => 0.00,
                'issueDate' => '2025-02-15 09:30:00',
                'status' => 'paid',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'employeeId' => 3,
                'amount' => 7000.00,
                'paymentPlan' => 7,
                'deductionPerPayroll' => 1000.00,
                'balance' => 4000.00,
                'issueDate' => '2025-01-20 14:45:00',
                'status' => 'unpaid',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cash_advance');
    }
};
