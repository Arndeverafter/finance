<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
//      // No Date Because all sales should have a corresponding account details for that specific date
        Schema::create('sales', static function (Blueprint $table) {
            $table->id();
            $table->integer('total_sales')->comment('Filled based on the product sold');
            $table->integer('total_measure')->comment('Maybe in kgs or Count')->default(1);
            $table->foreignId('account_id')->constrained()->cascadeOnUpdate();
            $table->text('description')->comment('Any comment regarding this sale on the given date will go here')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
