<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student_paper_mn extends Model
{
    protected $table='student_paper_mns';
    protected $filltable=['student_id','paper_id','created_at','updated_at'];
}
