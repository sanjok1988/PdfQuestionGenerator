<?php

namespace App\Modules\Roles\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Role;
use App\Permission;
use Auth;
use DB;
class RolesController extends Controller
{
    function __construct(){
      $this->middleware('auth');
    }

    public function showPage(){
      $user = Auth::user();
      if($user->hasRole("examhead")){
        return view('Roles::roles');
      }else{
        return view("Layouts::access_denied");
      }
      
    }
          /**

        * Display a listing of the resource.

        *

        * @return \Illuminate\Http\Response

        */

        public function index(Request $request)

        {

          $posts = Role::select('id','name','display_name','description')->orderBy('id','ASC')->paginate(10);
          $permission = $permission = Permission::get();

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
                     'permission' => $permission

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

              'name' => 'required|unique:roles,name',

              'display_name' => 'required',

              'description' => 'required',

              'permission' => 'required',

          ]);


          $role = new Role();

          $role->name = $request->input('name');

          $role->display_name = $request->input('display_name');

          $role->description = $request->input('description');

          $role->save();


          foreach ($request->input('permission') as $key => $value) {

              $role->attachPermission($value);

          }


          return response()->json($role);

        }

        /**

        * Display the specified resource.

        *

        * @param  int  $id

        * @return \Illuminate\Http\Response

        */

        public function show($id)

        {

          $role = Role::find($id);

          $rolePermissions = Permission::join("permission_role","permission_role.permission_id","=","permissions.id")

              ->where("permission_role.role_id",$id)

              ->get();


          return view('admin.roles.show',compact('role','rolePermissions'));

        }



        public function getRolePermissions($id){
          $rolePermissions = DB::table("permission_role")->where("permission_role.role_id",$id)

              ->lists('permission_role.permission_id','permission_role.permission_id');

              return response()->json($rolePermissions);
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

              'display_name' => 'required',

              'description' => 'required',

              'permission' => 'required',

          ]);


          $role = Role::find($request->id);

          $role->display_name = $request->input('display_name');

          $role->description = $request->input('description');

          $role->save();


          DB::table("permission_role")->where("permission_role.role_id",$request->id)

              ->delete();


          foreach ($request->input('permission') as $key => $value) {

              $role->attachPermission($value);

          }


          return response()->json($role);

        }

        /**

        * Remove the specified resource from storage.

        *

        * @param  int  $id

        * @return \Illuminate\Http\Response

        */

        public function destroy($id)

        {
          $user = Auth::user();
          if($user->hasRole('super')){
            $delete = DB::table("roles")->where('id',$id)->delete();
            return response()->json($delete);
          }


        }
}
