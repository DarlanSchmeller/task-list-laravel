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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('detailed_description')->nullable();
            $table->text('assignee');
            $table->enum('priority', ['low', 'medium', 'high']);
            $table->enum('status', ['to do', 'in progress', 'completed']);
            $table->enum('type', [
                'software', 
                'cooking', 
                'home', 
                'shopping', 
                'exercise', 
                'study', 
                'meeting', 
                'finance', 
                'travel', 
                'health', 
                'gardening', 
                'cleaning', 
                'entertainment'
            ])->default('home');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
