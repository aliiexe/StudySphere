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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->text('sub_description');
            $table->text('description');
            $table->string('school');
            $table->text('rating')->nullable();
            $table->float('avg_rating', 2, 1)->default(0.0)->max(5.0); 
            $table->foreignId('domaine_id')->nullable()->constrained('domaine_etudes')->onDelete('restrict')->onUpdate('restrict');
            $table->string('duree_du_cours');
            $table->string('pdf_file');
            $table->timestamps();
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
