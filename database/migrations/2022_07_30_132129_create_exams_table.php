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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('title',50);
            $table->boolean('dynamic')->default(false);
            $table->text('description');
            $table->foreignId('user_id')->default(1)->constrained()->cascadeOnDelete();
            $table->foreignId('subject_id')->default(env('DEFAULT_SUBJECT_ID'))->constrained()->cascadeOnDelete();
            $table->foreignId('lecture_id')->nullabl()->constrained()->cascadeOnDelete();
            $table->integer('time')->default(0);
            $table->softDeletes();

            $table->dateTime('starts_at')->nullable();
            $table->dateTime('ends_at')->nullable();
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
        Schema::dropIfExists('exams');
    }
};
