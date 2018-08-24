<?php

namespace App\Modules\Courses\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Courses extends Model {

    use SoftDeletes;
    protected $table = 'courses';
    protected $fillable = ['course_name','course_code'];

    public static function getCourseNameById($course_code){
        $course = Courses::where("course_code",$course_code)->get();
        return $course[0]->course_name;
    }
}
