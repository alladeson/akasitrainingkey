<?php

use App\Models\Course;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->nullable();
            $table->string('name_en')->unique()->nullable();
            $table->string('name_fr')->unique()->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_fr')->nullable();
            $table->string('url_tag')->unique()->nullable();
            $table->string('level_en')->nullable();
            $table->string('level_fr')->nullable();
            $table->string('duration_en')->nullable();
            $table->string('duration_type')->nullable(); // day(s) or hour(s)
            $table->integer('duration_number')->nullable(); // 1 2 3 4 5 6 7 8 9 10 11 etc.
            $table->string('duration_fr')->nullable();
            $table->boolean('after_course')->default(false);
            $table->string('learning_mode_en')->nullable();
            $table->string('learning_mode_fr')->nullable();
            $table->decimal('price_euro', 10, 0)->nullable();
            $table->decimal('price_fcfa', 10, 0)->nullable();
            $table->string('status_en')->default(Course::status_draft_en);
            $table->string('status_fr')->default(Course::status_draft_fr);
            $table->boolean('published')->default(false);
            $table->unsignedBigInteger('instructor_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('certification_id')->nullable();
            $table->unsignedBigInteger('vendor_id')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();


            $table->foreign('instructor_id')->references('id')->on('instructors');
            $table->foreign('category_id')->references('id')->on('course_categories');
            $table->foreign('certification_id')->references('id')->on('certifications');
            $table->foreign('vendor_id')->references('id')->on('vendors');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
