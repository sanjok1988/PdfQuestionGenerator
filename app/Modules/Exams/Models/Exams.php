<?php

namespace App\Modules\Exams\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exams extends Model {

    use SoftDeletes;
    protected $table = 'exams';
    protected $fillable = ['exam_type','academic_year','semester','course_code','full_mark','pass_mark','exam_date'];


}
