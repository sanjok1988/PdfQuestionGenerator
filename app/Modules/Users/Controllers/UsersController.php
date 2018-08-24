<?php

namespace App\Modules\Users\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\User;

use App\Role;

use DB;
use Auth;
use Hash;
class UsersController extends Controller
{
  protected $user;
  function __construct(User $user){
    $this->user = $user;
    $this->middleware('auth');
  }

  public function showPage(){
    $user = Auth::user();
    if($user->hasRole("examhead"))
      return view('Users::users');
    else
      return view("Layouts::access_denied");
  }
          /**

        * Display a listing of the resource.

        *

        * @return \Illuminate\Http\Response

        */

        public function index(Request $request)

        {
          $user = Auth::user();
          
        
          if($user->hasRole('examhead')){
            $posts = $this->user->orderBy('id','DESC')->paginate(10);
          }
     

          $roles = Role::lists('display_name','id');

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
                      'roles'=> $roles

                  ];
                return response()->json($response);
        }





        /**

        * Store a newly created resource in storage.

        *

        * @param  \Illuminate\Http\Request  $request

        * @return \Illuminate\Http\Response

        */

        public function store(Request $request)

        {

          $this->validate($request, [

              'name' => 'required',

              'email' => 'required|email|unique:users,email',

              'password' => 'required|same:confirm-password',

              'roles' => 'required'

          ]);


          $input = $request->all();

          $input['password'] = Hash::make($input['password']);


          $user = User::create($input);

          $user->attachRole($request->input('roles'));
            return redirect('users.create');


        }




        /**

        * Show the form for editing the specified resource.

        *

        * @param  int  $id

        * @return \Illuminate\Http\Response

        */

        public function getRole($id)

        {

          $user = User::find($id);

          $roles = Role::lists('display_name','id');

          $userRole = $user->roles->lists('id')->toArray();


          return response()->json($userRole);

        }


        /**

        * Update the specified resource in storage.

        *

        * @param  \Illuminate\Http\Request  $request

        * @param  int  $id

        * @return \Illuminate\Http\Response

        */

        public function update(Request $request)

        {

            $this->validate($request, [

                'name' => 'required',

                'email' => 'required|email|unique:users,email,'.$request->id,

                'password' => 'same:confirm-password',

                'roles' => 'required'

            ]);


            $input = $request->all();

            if(!empty($input['password'])){

                $input['password'] = Hash::make($input['password']);

            }else{

                $input = array_except($input,array('password'));

            }


            $user = User::find($request->id);

            $user->update($input);

            DB::table('role_user')->where('user_id',$request->id)->delete();

            $user->attachRole($request->input('roles'));

            return response()->json($user);

          }

/*
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return Response
 */
public function destroy(Request $request)
{

  if($request->ajax()){
      $success = $this->user->find($request->id)->delete();

      if($success){
        return response()->json($success);
      }else{
        return response()->json($success);
      }

  }else{
    return response()->json($success);
  }
}
}
