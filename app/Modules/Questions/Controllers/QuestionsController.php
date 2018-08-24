<?php

namespace App\Modules\Questions\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Questions\Models\Questions;
use App\Modules\Chapters\Models\Chapters;

use Auth;

class QuestionsController extends Controller
{

    protected $question, $chapter;

    public function __construct(Questions $question, Chapters $chapter)
    {
        $this->middleware('auth');
        $this->question = $question;
        $this->chapter = $chapter;
       
    }
    public function index($course_code,$chapter_id){
    
      
            return view("Questions::index")->with(compact("course_code","chapter_id"));
          
       
    }

    public function getAllList(){
        $user = Auth::user();
            if($user->hasRole('examhead','examiner','supervisor')){
                $posts = $this->question
                ->select('question_id','question','difficulty_level','assigned_mark','chapter_id','course_code','question_type')       
                
                ->orderBy('question_id','DESC')         
                ->paginate(10);
    
                $chapters = $this->chapter->get();
    
                $response = [
                            'pagination' => [
                            'total' => $posts->total(),
                            'per_page' => $posts->perPage(),
                            'current_page' => $posts->currentPage(),
                            'last_page' => $posts->lastPage(),
                            'from' => $posts->firstItem(),
                            'to' => $posts->lastItem()
                            ],
                            'data' => $posts,
                            'chapter'=>$chapters
                        ];
    
            }else{
                $response = "user don't have sufficient previllage";
            }
            return response()->json($response);
    }

    public function help(){
        return view("Questions::help");
    }


    public function getList($course_code, $chapter_id){
        
        $response = "no response";
    //  $test = Auth::user()->can(['userlist'], true);
            $user = Auth::user();

            if($user->hasRole('examhead','examiner','supervisor')){
                $posts = $this->question
                ->select('question_id','question','difficulty_level','assigned_mark','chapter_id','course_code','question_type')
                ->where([["course_code","=",$course_code],["chapter_id","=",$chapter_id]])
                
                ->orderBy('question_id','DESC')         
                ->paginate(10);

                $chapters = $this->chapter->get();

                $response = [
                            'pagination' => [
                            'total' => $posts->total(),
                            'per_page' => $posts->perPage(),
                            'current_page' => $posts->currentPage(),
                            'last_page' => $posts->lastPage(),
                            'from' => $posts->firstItem(),
                            'to' => $posts->lastItem()
                            ],
                            'data' => $posts,
                            'chapter'=>$chapters
                        ];

            }else{
                $response = "user don't have sufficient previllage";
            }

            return response()->json($response);
    }


    /**
     * Store a new question
     * update question
     * @return Response
     */
    public function store(Request $request, $course_code)
    {
        if ($request->ajax()) {
          $data = $request->only(['question', 'question_id','difficulty_level','question_type','assigned_mark','chapter_id']);

          
            if ($this->question->where("question_id",$data['question_id'])->count()>0) {
                $success = $this->question->where("question_id",$data['question_id'])->update($data);
         
                if($success){
                    return response()->JSON($success);
                }else{
                    return response()->JSON(["msg"=>"error while updating"]);
                }
            } else {
                $data['course_code'] = $course_code;
                $success = $this->question->create($data);
                if (count($success)>0) {

                    return response()->json($success);
                } else {

                    return response()->json($success);
                }
            }

        }
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function delete(Request $request,$course_code, $id)
    {
        if ($request->ajax()) {
            
            $delete = $this->question->where("question_id", $id)->delete();
            if($delete){
                return response()->json($delete);
            }
        }
    }
}
