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
        Schema::create('expenses', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->cascadeOnUpdate();
            $table->bigInteger('price');
            $table->integer('measure')->comment('In Kgs / Count / other')->nullable();
            $table->string('description')->comment('Expenses such as salaries can go here too');
            $table->foreignId('shop_id')->comment('For what shop is this Expense from')->constrained()->cascadeOnUpdate();
            $table->date('date');
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
        Schema::dropIfExists('expenses');
    }
};
