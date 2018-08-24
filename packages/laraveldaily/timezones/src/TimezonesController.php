<?php
namespace laraveldaily\timezones;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

class TimezonesController extends Controller{

  public function index(){
    dd(config("session"));
    return view('timezones::time')->with("time","test time");
  }
}
