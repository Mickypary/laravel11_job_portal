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
        Schema::create('home_page_items', function (Blueprint $table) {
            $table->id();
            $table->text('heading');
            $table->text('text')->nullable();
            $table->text('job_title');
            $table->text('job_category');
            $table->text('job_location');
            $table->text('search');
            $table->text('background_image');
            $table->text('job_category_heading');
            $table->text('job_category_subheading')->nullable();
            $table->text('job_category_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_page_items');
    }
};
