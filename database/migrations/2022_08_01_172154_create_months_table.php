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
        Schema::create('months', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('semester',['الفصل الدراسي الأول','الفصل الدراسي الثاني']);
            $table->string('short_description',100);
            $table->text('description');
            $table->boolean('published')->default(0);
            // $table->boolean('show_in_main')->default(0);
            $table->string('promotinal_video_url')->nullable();
            $table->string('poster')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('slug',100)->unique();
            $table->boolean('free')->default(0);
            $table->float('price');
            $table->float('final_price');
            $table->date('discount_expiry_date')->nullable();
            $table->string('duration')->default('0 ساعة');
            $table->integer('total_questions_count')->default(0);
            $table->foreignId('subjects_id')->default(env('DEFAULT_SUBJECT_ID'))->constrained()->cascadeOnDelete();
            $table->foreignId('grade_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('months');
    }
};
