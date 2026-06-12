<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('spa_models', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('width');
            $table->unsignedInteger('height');
            $table->unsignedInteger('corner_radius')->default(0);
            $table->string('hinge_position')->nullable();
            $table->string('color');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('spa_models');
    }
};
