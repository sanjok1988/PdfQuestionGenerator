<?php

namespace App\Modules\Questions\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Questions extends Model {

    use SoftDeletes;
    protected $table = 'questions';
    protected $fillable = ['question','difficulty_level','assigned_mark','chapter_id','course_code','question_type'];

   /**
     * Get the post that owns the comment.
     */
    public function chapters()
    {
        return $this->belongsTo('App\Modules\Chapters\Models\Chapters','chapter_id');
    }

    public static function getQuestionCountByCourseCode($course_code){
        return Questions::where("course_code",$course_code)->count();
        
    }
}
