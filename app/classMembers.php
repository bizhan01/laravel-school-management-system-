<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassMembers extends Model
{
    protected $fillable = ['sub_class_id', 'main_class_id', 'student_id'];
}
