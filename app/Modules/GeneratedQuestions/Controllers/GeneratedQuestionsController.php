<?php

namespace App\Modules\GeneratedQuestions\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\GeneratedQuestions\Models\GeneratedQuestions;
use App\Modules\Questions\Models\Questions;
use App\Modules\Exams\Models\Exams;
use App\Modules\Courses\Models\Courses;
use PDF;
use Exception;
use DB;

class GeneratedQuestionsController extends Controller
{

    protected $question, $equestions, $exam, $course;

    public function __construct(GeneratedQuestions $question, Questions $equestions, Exams $exam, Courses $course)
    {
        $this->middleware('auth');
        $this->question = $question;
        $this->equestions = $equestions;
        $this->exam = $exam;
        $this->course = $course;
    }

    public function getPastQuestions(){
        return view("GeneratedQuestions::index");
    }

    public function index(){
    
        return view("GeneratedQuestions::generateQuestion");
    }


    public function add(){

        return view("GeneratedQuestions::addQuestions");
    }

    public function getList($course_code){
        
        $response = "no response";
    //  $test = Auth::user()->can(['userlist'], true);
            $user = Auth::user();

            if($user->hasRole('super','administrator')){
                $posts = $this->question
                ->select('exam_id','question_id','revised_mark')
                ->where("course_code",$course_code)
                
                ->orderBy('exam_id','DESC')         
                ->paginate(10);


                $response = [
                            'pagination' => [
                            'total' => $posts->total(),
                            'per_page' => $posts->perPage(),
                            'current_page' => $posts->currentPage(),
                            'last_page' => $posts->lastPage(),
                            'from' => $posts->firstItem(),
                            'to' => $posts->lastItem()
                            ],
                            'data' => $posts
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
    public function store(Request $request)
    {
        $success = 0;
        if ($request->ajax()) {
          $data = $request->only(['exam_id', 'question_type','difficulty_level','no_of_question']);
          //add validation 
          //marks should not be greater than full marks

                $questions_data = $this->equestions->select(DB::raw("SUM(assigned_mark) as mark, question_id"))->where([['question_type','=',$data['question_type']],
                ['difficulty_level','=',$data['difficulty_level']]])
                ->inRandomOrder()
                ->limit($data['no_of_question'])->get();

                //get full mark for comparision
                $exam = $this->exam->select("full_mark")->where("exam_id",$data['exam_id'])->first();
              
                if($questions_data[0]->mark >$exam->full_mark){
                    return response()->json("marks assigned cannot be more than full marks: full mark=".$exam->full_mark. " and your questions total marks is ".$questions_data[0]->mark);
                }

            
                if($questions_data!=null){
                    $ar[] = null;
                    foreach($questions_data as $q){
     
                        $ar['question_id'] = $q->question_id;
                        $ar['exam_id'] = $data['exam_id'];
                        $this->question->create($ar);
                        $success++;
                    }
                    
                    if (count($success)>0) {
    
                        return response()->json($success);
                    } else {
    
                        return response()->json($success);
                    }
                }else{
                    return response()->json("data not found");
                }
                
            

        }
    }

    // public function extractQuestions(Request $request){
        
    //     $q = $this->question
    //     ->select('question','assigned_mark','question_type')
    //     ->leftJoin('exams as e','e.exam_id','=','generated_questions.exam_id')
    //     ->leftJoin('questions as q','q.question_id','=','generated_questions.question_id')
    //     ->where([['generated_questions.exam_id','=', $request->exam_id],
    //         ['e.course_code','=',$request->course_code],
    //         ['e.semester','=',$request->semester]])
    //     ->get();
    //     return response()->json($q);
    // }

    public function viewQuestions(Request $request){
        $semester = $request->semester;
        $course_code = $request->course_code;
        $exam_id = $request->exam_id;
        $q = $this->question
        ->select('q.question_id as qid','question','assigned_mark','question_type','difficulty_level','chapter_id')
        ->leftJoin('exams as e','e.exam_id','=','generated_questions.exam_id')
        ->leftJoin('questions as q','q.question_id','=','generated_questions.question_id')
        ->where([['generated_questions.exam_id','=', $exam_id],
            ['e.course_code','=',$course_code],
            ['e.semester','=',$semester]])
        ->get();
        
        return view("GeneratedQuestions::viewQuestions")->with(compact(["exam_id","semester","course_code","q"]));
    }

    public function exportPDF(Request $request){
        $semester = $request->semester;
        $course_code = $request->course_code;
        $course_name = $this->course->select("course_name")->where("course_code",$course_code)->get();
        $course_name = $course_name[0]->course_name;
        $exam_id = $request->exam_id;
        $examDetails = $this->exam->where('exam_id',$exam_id)->get();
        $q = $this->question
        ->select('question','assigned_mark','question_type')
        ->leftJoin('exams as e','e.exam_id','=','generated_questions.exam_id')
        ->leftJoin('questions as q','q.question_id','=','generated_questions.question_id')
        ->where([['generated_questions.exam_id','=', $request->exam_id],
            ['e.course_code','=',$request->course_code],
            ['e.semester','=',$request->semester]])
            ->orderby("question_type","DESC")
        ->get();
        
        if($q->count()>0){
            $pdf = PDF::loadView('GeneratedQuestions::pdf', compact(["examDetails","semester","course_code","q","course_name"]));
  
            //return view("GeneratedQuestions::pdf")->with(compact(["examDetails","semester","course_code","q"]));
            return $pdf->download('question.pdf');
        }else{
            return "There is no questions selected for this exam. please add question first then export to pdf.";
        }
        
  
      }
    
      public function exportToWord(){
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();


        
        $section->addText("hello world");


       // $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
// Saving the document as ODF file...
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'ODText');
$objWriter->save(storage_path('helloWorld.odt'));
        // try {

        //     $objWriter->save(storage_path('helloWorld.docx'));

        // } catch (Exception $e) {

        // }


            return response()->download(storage_path('helloWorld.odt'));

        
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
            
            $delete = $this->question->where("question_id", $id)->delete();
            if($delete){
                return response()->json($delete);
            }
        }
    }

    public function deleteQuestion(Request $request){
     
        $this->question->where('question_id', $request->qid)->delete();
        return back();
    }
}
