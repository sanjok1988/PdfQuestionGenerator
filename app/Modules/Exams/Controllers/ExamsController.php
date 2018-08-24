<?php

namespace App\Modules\Exams\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Exams\Models\Exams;
use App\Modules\Courses\Models\Courses;
use Illuminate\Support\Facades\Input;
use Auth;

class ExamsController extends Controller{

    protected $exam, $course;

    public function __construct(Exams $exam, Courses $course)
    {
        $this->middleware('auth');
        $this->exam = $exam;
        $this->course = $course;
    }
    public function index(){
        return view("Exams::index");
    }


        public function getList(){
            $response = "no response";
       
                $user = Auth::user();

                if($user->hasRole('examhead','supervisor','examiner')){
                    $posts = $this->exam
                    ->select(
                        'exam_id',
                    'exam_type',
                    'exam_date',
                    'semester',
                    'academic_year',
                    'full_mark',
                    'pass_mark',
                    'course_code',
                    'deleted_at'
                        )
                    ->orderBy('exam_id')         
                    ->paginate(10);

                    $courses = $this->course->select('course_name','course_code')->get();
                    $response = [
                              'pagination' => [
                              'total' => $posts->total(),
                              'per_page' => $posts->perPage(),
                              'current_page' => $posts->currentPage(),
                              'last_page' => $posts->lastPage(),
                              'from' => $posts->firstItem(),
                              'to' => $posts->lastItem()
                              ],
                              'data'=>$posts,
                              'courses'=>$courses

                          ];

                }else{
                  $response = "user don't have sufficient previllage";
                }

                return response()->json($response);

    }


    /**
     * Store a new exam
     * update exam
     * @return Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        if($user->hasRole("examhead")){

            if ($request->ajax()) {
                $data = $request->only(['exam_type', 'exam_date','semester','full_mark','pass_mark','acamedic_year','course_code']);
      
                
                  if ($this->exam->where("exam_id",$request->exam_id)->count()>0) {
                      $success = $this->exam->where("exam_id",$request->exam_id)->update($data);
               
                      if($success){
                          return response()->JSON($success);
                      }else{
                          return response()->JSON(["msg"=>"error while updating"]);
                      }
                  } else {
                      $success = $this->exam->create($data);
                      if (count($success)>0) {
      
                          return response()->json($success);
                      } else {
      
                          return response()->json($success);
                      }
                  }
      
              }
        }else{
            return view("Layouts::access_denied");
        }
       
       
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function delete(Request $request,$id)
    {
        if ($request->ajax()) {
            
            $delete = $this->exam->where("exam_code", $id)->delete();
            if($delete){
                return response()->json($delete);
            }
        }
    }
}
