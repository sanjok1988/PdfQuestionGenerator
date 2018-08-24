<?php

namespace App\Modules\GeneratedQuestions\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GeneratedQuestions extends Model {

    use SoftDeletes;
    protected $table = 'generated_questions';
    protected $fillable = ['exam_id','question_id','revised_mark'];

}
