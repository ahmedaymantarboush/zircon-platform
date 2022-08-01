<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Month extends Model
{
    use HasFactory,
        SoftDeletes;
/*
            $table->string('title');
            $table->foreignId('grade_id')->constrained()->cascadeOnDelete();
            $table->string('short_description',100);
            $table->enum('semester',['الفصل الدراسي الأول','الفصل الدراسي الثاني']);
            $table->text('description');
            $table->string('poster')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('slug',100)->unique();
            $table->boolean('published')->default(0);
            $table->string('promotinal_video_url')->nullable();
            $table->boolean('free')->default(0);
            $table->float('price');
            $table->float('final_price');
            $table->date('discount_expiry_date')->nullable();
*/
    protected $fillable = [
        'title',
        'semester',
        'short_description',
        'description',
        'published',
        'promotinal_video_url',
        'poster',
        'meta_keywords',
        'meta_description',
        'slug',
        'price',
        'final_price',
        'discount_expiry_date',
        'duration',
        'total_questions_count',

        'subject_id',
        'grade_id',
        'part_id',
        'user_id',
];

}
