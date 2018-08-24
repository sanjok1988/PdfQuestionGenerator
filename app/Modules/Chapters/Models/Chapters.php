<?php

namespace App\Modules\Chapters\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chapters extends Model {

    use SoftDeletes;
    protected $table = 'chapters';
    protected $fillable = ['chapter_name','course_code'];

    public static function getChapterNameById($chapter_id){
        $chapter = Chapters::where("chapter_id",$chapter_id)->get();
        return $chapter[0]->chapter_name;
    }

    public static function getChapterCountByCourseCode($course_code){
        return Chapters::where("course_code",$course_code)->count();
        
    }

    public function questions(){
        return $this->hasMany('App\Modules\Questions\Models\Questions','question_id');
    }

}
