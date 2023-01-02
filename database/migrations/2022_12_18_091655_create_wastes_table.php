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
        Schema::create('wastes', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('waste_type_id')->constrained()->cascadeOnUpdate();
            $table->foreignId('account_id')->constrained()->cascadeOnUpdate();
            $table->integer('measure')->comment('Can be in kgs or Count')->default(1);
            $table->integer('total')->comment('This is automatically calculated based on the waste measure above')->default(0);
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
        Schema::dropIfExists('wastes');
    }
};
