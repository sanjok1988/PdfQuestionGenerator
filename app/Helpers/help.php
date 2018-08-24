<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use App\User;

class Help
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public static function getSiteName()
    {
        return "PreQuesGen";
    }

    public function getCurrentUserId()
    {
        return Auth::user()->id;
    }

    public static function getCurrentUserName()
    {
        $user = User::select('name')->find(Auth::user());
        return $user['name'];
    }



    /**
    * check is file exists
    * @param $filename
    * @param string $folder default is uploads
    * @return boolean
    */
    public static function isFileExists($filename, $folder=null)
    {
        if (!empty($filename)) {
            if ($folder==null) {
                $path = base_path() . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR .'uploads' . DIRECTORY_SEPARATOR.$filename;
            } else {
                $path = base_path() . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR .$folder . DIRECTORY_SEPARATOR.$filename;
            }

            if (File::exists($path)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
