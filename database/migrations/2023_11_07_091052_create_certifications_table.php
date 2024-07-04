<?php

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
        Schema::create('certifications', function (Blueprint $table) {
            $table->id();
            $table->string('name_en')->unique();
            $table->string('name_fr')->unique()->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_fr')->nullable();
            $table->decimal('fees_euro', 10, 0)->nullable();
            $table->decimal('fees_fcfa', 10, 0)->nullable();
            $table->decimal('tax', 10, 0)->nullable(); //en pourcentage(%)
            $table->string('fees_description_en')->nullable();
            $table->string('fees_description_fr')->nullable();
            $table->string('url_tag')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certifications');
    }
};
