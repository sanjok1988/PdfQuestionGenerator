
@extends('Layouts::app')
@section('title','Dashboard')

@section('content')
<h1>Dashboard</h1>

<div class="row tile_count" style="height:100px">
    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
            <span class="count_top"><i class="fa fa-book"></i> Total Courses</span>
            <div class="count">{{App\Modules\Courses\Models\Courses::count()}}</div>
        </div>
    </div>
    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
            <span class="count_top"><i class="fa fa-clone"></i> Total Chapters</span>
            <div class="count">{{App\Modules\Chapters\Models\Chapters::count()}}</div>
        </div>
    </div>
    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
            <span class="count_top"><i class="fa fa-tag"></i> Total Exams</span>
            <div class="count">{{App\Modules\Exams\Models\Exams::count()}}</div>
        </div>
    </div>
    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
            <span class="count_top"><i class="fa fa-user"></i>Total Users</span>
            <div class="count">{{App\User::count()}}</div>
        </div>
    </div>
    <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
            <span class="count_top"><i class="fa fa-bullhorn"></i> Total Questions</span>
            <div class="count green">{{App\Modules\Questions\Models\Questions::count()}}</div>
        </div>
    </div>


    

</div>
<div class="clearfix"></div>
<div class="row">
  <div class="col-md-4">

  </div>
  <div class="col-md-4">

  </div>
 
  </div>
</div>
<!-- /top tiles -->
<div class="clearfix"></div>
<div class="row">
</div>
@endsection
