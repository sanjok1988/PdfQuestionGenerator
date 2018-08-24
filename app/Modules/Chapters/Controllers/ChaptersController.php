<?php

namespace App\Modules\Chapters\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Chapters\Models\Chapters;
use App\Modules\Questions\Models\Questions;
use Illuminate\Support\Facades\Input;
use Auth;

class ChaptersController extends Controller
{

    protected $chapter;

    public function __construct(Chapters $chapter, Questions $question)
    {
        $this->middleware('auth');
        $this->chapter = $chapter;
        $this->question = $question;
    }
    public function index(){
        return view("Chapters::index");
    }

    public function create($course_code){
     
        return view("Chapters::index")->with(compact('course_code'));
    }


        public function getList($course_code){
            
            $response = "no response";
                $user = Auth::user();

                if($user->hasRole('examhead','examiner','supervisor')){
                    $posts = $this->chapter
                    ->select(
                        'chapter_id',
                    'chapter_name',
                    'course_code',
                    'deleted_at'
                        )->where('course_code',$course_code)
                    ->orderBy('chapter_name')         
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
                              'data'=>$posts

                          ];

                }else{
                  $response = "user don't have sufficient previllage";
                }

                return response()->json($response);

    }


    /**
     * Store a new chapter
     * update chapter
     * @return Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
          $data = $request->only(['chapter_name', 'course_code']);

          
            if (!empty($request->chapter_id)) {
                $success = $this->chapter->where("chapter_id", $request->chapter_id)->update(["chapter_name"=>$data["chapter_name"]]);
                        
                if($success){
                    return response()->JSON($success);
                }else{
                    return response()->JSON(["msg"=>"error while updating"]);
                }
            } else {
                $success = $this->chapter->create($data);
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
    public function delete(Request $request,$id)
    {
        if ($request->ajax()) {
            $delete = $this->chapter->where("chapter_id",$id)->delete();
         
            if($delete){
                return response()->json($delete);
            }
        }
    }
}
