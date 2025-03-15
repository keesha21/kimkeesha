<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id('employeeId');
            $table->string('firstName');
            $table->string('middleName')->nullable();
            $table->string('lastName');
            $table->enum('gender', ['male', 'female']);
            $table->date('birthdate');
            $table->enum('maritalStatus', ['single', 'married', 'divorced', 'widowed']);
            $table->unsignedBigInteger('positionId');
            $table->date('hireDate');
            $table->string('address');
            $table->string('contactNumber');
            $table->enum('status', ['regular', 'contract']);
            $table->timestamps();

            $table->foreign('positionId')->references('positionId')->on('position')->onDelete('cascade')->onUpdate('cascade');
        });

       
        DB::table('employees')->insert([
            [
                'firstName' => 'Khem',
                'middleName' => 'B.',
                'lastName' => 'U',
                'gender' => 'male',
                'birthdate' => '2000-05-15',
                'maritalStatus' => 'single',
                'positionId' => 1, 
                'hireDate' => '2020-06-01',
                'address' => 'Taytay',
                'contactNumber' => '09123456789',
                'status' => 'regular',
            ],
            [
                'firstName' => 'Lance',
                'middleName' => 'B.',
                'lastName' => 'Katigbak',
                'gender' => 'female',
                'birthdate' => '1999-10-22',
                'maritalStatus' => 'married',
                'positionId' => 2, 
                'hireDate' => '2018-03-15',
                'address' => 'tambaling',
                'contactNumber' => '09987654321',
                'status' => 'contract',
            ],
            [
                'firstName' => 'Aldwin',
                'middleName' => 'C.',
                'lastName' => 'Labis',
                'gender' => 'female',
                'birthdate' => '2004-07-30',
                'maritalStatus' => 'single',
                'positionId' => 3, 
                'hireDate' => '2022-09-10',
                'address' => 'amoros',
                'contactNumber' => '09123454689',
                'status' => 'regular',
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
