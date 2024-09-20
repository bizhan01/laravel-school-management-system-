<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $fillable = ['student_id', 'sub_grade', 'subject', 'midterm_score', 'final_score' ];
}
