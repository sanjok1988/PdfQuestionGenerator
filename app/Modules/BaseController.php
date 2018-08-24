<?php

namespace App\Modules;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use Auth;
class BaseController extends Controller
{
  function __construct(){
    $this->middleware('auth');
  }
  // $super = Auth::user()->hasRole('super');
  // $admin = Auth::user()->hasRole('administrator');
  // $editor = Auth::user()->hasRole('editor');
  // $contributor = Auth::user()->hasRole('contributor');
  // $author = Auth::user()->hasRole('author');
  // $subscriber = Auth::user()->hasRole('subscriber');


public function getUserId(){
  return Auth::user()->id;
}

public function deleteFile($filename,$folder=null){
  if($folder==null) {
    $folder = "uploads";
  }

    $full_path = base_path().DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.$folder.DIRECTORY_SEPARATOR.$filename;
    $icon_path = base_path().DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'icons'.DIRECTORY_SEPARATOR.$filename;
    if ( File::exists($full_path) )
    {
        File::delete( $full_path );
    }
    if ( File::exists($icon_path) )
    {
        File::delete( $icon_path );
    }

}
/*
 * forceDelete
 * ajax request
 * @param String $model
 */

    // public function destroy($id, $model){
    //     if ($request->ajax()) {
    //
    //         $find = $this->$model->find($id);
    //         if(count($find) >0){
    //             $success = $find->forceDelete();
    //             if ($success) {
    //                 return response()->json(['code' => 200,'msg'=>"Permanently Deleted" ]);
    //             } else {
    //                 return response()->json(['code' => 200,'msg' => 'Error occured while deleting data']);
    //             }
    //         }else{
    //             return response()->json(['code' => 200,'msg' => 'Row not found']);
    //         }
    //
    //     } else {
    //         return response()->json(['code'=>403,'msg'=>"Forbidden! You do not have permission "]);
    //     }
    // }

    /**
     * @param String $model
     * publish & unpublish
     * publish is null stored in deleted_at
     * unpublish is date stored in deleted_at
     * user can publish and unpublish from same button
     */
    public function publishUnpublish(Request $request,$model, $id=null){
        if($request->ajax()){

            if($id == null){
                $id = $request->id;
            }

            /*
             * search softdeleted rows
             * if find any restore
             * else softDelete row
             */

            $find = $this->$model->where('id','=',$id)
                ->onlyTrashed()->first();

            if(count($find)>0){
                $restored = $find->restore();
                if($restored){
                    return response()->json(['code'=>200,'msg'=>"Successfully Restored"]);
                }else{
                    return response()->json(['code'=>400,'msg'=>"Error occured while restoring data"]);
                }
            }else{
                $find = $this->$model
                    ->where('id','=',$id)
                    ->first();
                $removed = $find->delete();
                if($removed){
                    return response()->json(['code'=>200,'msg'=>"Successfully Trashed"]);
                }else{
                    return response()->json(['code'=>400,'msg'=>"Error occured while deleting data"]);
                }
            }

        }else{
            return response()->json(['code'=>403,'msg'=>"Forbidden! You do not have permission "]);
        }
    }

    /**
    * crop image, fit
    * @param $file type file
    * @param int width, int height
    * return filename;
    */
    public function thumbnail($file, $width=null,$height=null,$location=null){
            //$filename = $file->getClientOriginalName();
            $mime_type = $file->getClientOriginalExtension();
            $filename = hash('md5', microtime()).'.'.$mime_type;
            //if crop size exist
            $manager = new ImageManager();
            if($location == null){
              $location = base_path().DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR;
            }
            if($width != null && $height != null){
              $image = $manager->make( $file )->fit($width, $height)
                  ->save( $location . $filename );
            }else{
              $image = $manager->make( $file )->save( $location . $filename );

            }


        return $filename;
      }
/**
* stores given image with size in predefined icons folder
* @param $file = Image
* @param $filename = filename stored in database
* @param $location is folder path
* @param $width $height crop size
**/
      public function icon($file,$filename=null, $location=null, $width=null,$height=null){
              //$filename = $file->getClientOriginalName();
              $mime_type = $file->getClientOriginalExtension();
              
              if($filename==null){
                $filename = hash('md5', microtime()).'.'.$mime_type;
              }

              //if crop size exist
              $manager = new ImageManager();
              if($location == null){
                $location =  base_path().DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'icons'.DIRECTORY_SEPARATOR;
              }
              if($width == null && $height == null){
                  $width = 200;
                  $height = 200;
              }

              $image = $manager->make( $file )->fit($width, $height)
                  ->save( $location . $filename );
              if($image){
                return $filename;
              }

        }

        /*
        *  delete entire files from folder
        *  @return boolen
        */
        public function deleteFolder($array){
          $return = false;
          if(is_object($array)){

            foreach($array as $value){
              $this->destroyFiles($value->filename);
            }
            $return = true;
          }
          return $return;

        }

        public function reOrder($order,$model){

            foreach ($order as $key=>$value) {
                $this->$model->where('id', $value)->update(['orderId' => $key]);
            }


        }

}
