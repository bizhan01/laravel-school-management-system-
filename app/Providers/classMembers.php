<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassMembers extends Model
{
    protected $fillable = ['class_id', 'student_id', 'score'];
}
