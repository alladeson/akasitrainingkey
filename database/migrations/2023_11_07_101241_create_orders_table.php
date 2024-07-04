<?php

use App\Models\Order;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('schedule_id');
            $table->string('invoice_number')->nullable();
            $table->string('receipt_number')->nullable();
            $table->string('status_en')->default(Order::pending_en);
            $table->string('status_fr')->default(Order::pending_fr);
            $table->string('mode')->nullable();
            $table->decimal('amount', 10, 0)->nullable();
            $table->decimal('amount_euro', 10, 0)->nullable();
            $table->decimal('amount_fcfa', 10, 0)->nullable();
            $table->decimal('amount_total_euro', 10, 0)->nullable();
            $table->decimal('amount_total_fcfa', 10, 0)->nullable();
            $table->integer('quantity');
            $table->string('translation_id')->nullable();
            $table->string('currency')->nullable();
            $table->dateTime('payment_date')->nullable();
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('schedule_id')->references('id')->on('schedules');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
