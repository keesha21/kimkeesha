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
        Schema::create('position', function (Blueprint $table) {
            $table->id('positionId');
            $table->string('positionName');
            $table->decimal('rate');
            $table->timestamps();
        });

        DB::table('position')->insert([
            ['positionName' => 'Manager', 'rate' => 5000.00, 'created_at' => now(), 'updated_at' => now()],
            ['positionName' => 'Supervisor', 'rate' => 3500.00, 'created_at' => now(), 'updated_at' => now()],
            ['positionName' => 'Staff', 'rate' => 2500.00, 'created_at' => now(), 'updated_at' => now()]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('position');
    }
};
