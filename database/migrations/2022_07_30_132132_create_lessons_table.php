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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('title',50);
            $table->string('url')->unique();
            $table->string('duration',50);
            $table->enum('type',['video','pdf','audio']);
            $table->enum('semester',['الفصل الدراسي الأول','الفصل الدراسي الثاني']);
            $table->text('description');
            $table->foreignId('exam_id')->nullable()->constrained()->cascadeOnDelete();
            $table->float('min_percentage')->nullable();
            $table->foreignId('part_id')->constrained()->cascadeOnDelete();
            $table->foreignId('lecture_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('lessons');
    }
};
