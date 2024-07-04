<?php

use App\Models\Schedule;
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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->date('started_date');
            $table->date('end_date');
            $table->time('started_time');
            $table->time('end_time');
            $table->string('location_en');
            $table->string('location_fr')->nullable();
            $table->string('status')->default(Schedule::status_draft);
            $table->boolean('published')->default(false);
            $table->string('description_en')->nullable();
            $table->string('description_fr')->nullable();
            $table->decimal('amount_euro', 10, 0)->nullable();
            $table->decimal('amount_fcfa', 10, 0)->nullable();
            $table->decimal('tax', 10, 0)->nullable(); //en pourcentage(%)
            $table->string('time_zone')->default('UTC');
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
