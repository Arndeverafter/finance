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
        Schema::create('accounts', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->cascadeOnUpdate();
            $table->float('set_price')->comment('Set the Price for the given date for that particular Category');
            $table->foreignId('shop_id')->comment('For what shop is this price going to be set')->constrained()->cascadeOnUpdate();
            $table->float('measure')->comment('In Kgs / Count | This Depends on the Category Chosen')->default(1);
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
        Schema::dropIfExists('accounts');
    }
};
