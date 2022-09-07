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
            $table->string('title');
            $table->string('url');
            $table->integer('time');
            $table->string('poster')->default(asset('admin/assets/imgs/lecture-holder.webp'));
            $table->enum('type',['video','pdf','audio']);
            $table->enum('semester',['الفصل الدراسي الأول','الفصل الدراسي الثاني']);
            $table->text('description');
            $table->foreignId('exam_id')->nullable()->constrained()->cascadeOnDelete();
            $table->float('min_percentage')->nullable();
            $table->foreignId('user_id')->default(1)->constrained()->cascadeOnDelete();
            $table->foreignId('part_id')->constrained()->cascadeOnDelete();
            $table->foreignId('grade_id')->constrained()->cascadeOnDelete();
            $table->foreignId('lecture_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('lessons');
    }
};
