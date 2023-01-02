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
        // No Date Because all discounts should have a corresponding account details for that specific date
        Schema::create('discounts', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained()->cascadeOnUpdate();
            $table->integer('amount')->default(0);
            $table->float('measure')->default(1)->comment('It may be weight or count but it drains down from category to accounts to here');
            $table->integer('total')->comment('This is automatically calculated based on total Discounted Kgs for the given account')->default(0);
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
        Schema::dropIfExists('discounts');
    }
};
