<?php

namespace App\Modules\Courses\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Courses\Models\Courses;
use Illuminate\Support\Facades\Input;
use Auth;

class CoursesController extends Controller
{

    protected $course;

    public function __construct(Courses $course)
    {
        $this->middleware('auth');
        $this->course = $course;
    }
    public function index(){
        return view("Courses::index");
    }


        public function getList(){
            $response = "no response";
                $user = Auth::user();

                if($user->hasRole('examhead','supervisor','examiner')){
                    $posts = $this->course
                    ->select(
                    'course_name',
                    'course_code',
                    'deleted_at'
                        )
                    ->orderBy('course_name')         
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
     * Store a new course
     * update course
     * @return Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
          $data = $request->only(['course_name', 'course_code']);

          
            if ($this->course->where("course_code",$data['course_code'])->count()>0) {
                $success = $this->course->where("course_code",$data['course_code'])->update($data);
         
                if($success){
                    return response()->JSON($success);
                }else{
                    return response()->JSON(["msg"=>"error while updating"]);
                }
            } else {
                $success = $this->course->create($data);
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
            
            $delete = $this->course->where("course_code", $id)->delete();
            if($delete){
                return response()->json($delete);
            }
        }
    }
}
