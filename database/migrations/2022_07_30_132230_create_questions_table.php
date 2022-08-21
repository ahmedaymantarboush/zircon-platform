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
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('text')->nullable();
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->string('audio')->nullable();
            $table->enum('type',['MCQ','Written']);
            $table->text('explanation')->nullable();
            $table->integer('level');
            $table->foreignId('grade_id')->constrained()->cascadeOnDelete();
            $table->foreignId('part_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->default(1)->constrained()->cascadeOnDelete();
            $table->foreignId('subject_id')->default(env('DEFAULT_SUBJECT_ID'))->constrained()->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
};
