<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubClass extends Model
{
    protected $fillable = ['main_class_id','group', 'group', 'shift', 'year'];
}
