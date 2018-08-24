<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
        {{ HTML::style("cms/css/bootstrap.min.css")}} 
        <style>
        table {
            border-spacing: 32px;
            }
        </style>
  </head>
  <body>
  <?php
    $saq = 0;
    $mcq = 0;
    $laq = 0;
    $mth = 0;
    $pq = 0;
    $fib = 0;

  foreach($q as $post){
    switch($post->question_type){
        case "saq":
            $saq++;    
            break;
        case "mcq":
            $mcq++;    
            break;
        case "laq":
            $laq++;    
            break;
        case "pq":
            $pq++;    
            break;
        case "match":
            $match++;    
            break;
        case "fib":
            $fib++;    
            break;
    }
  }
?>
			
<div class="row">
<div class="col-md-12" style="text-align:center">
<h1>UCSI</h1>
    <h4><u>UNIVERSITY</u></h4>
<h3>FACULTY OF BUSINESS AND INIFORMATION CENTER</h3>
  @foreach($examDetails as $e)
  <h3>{{$e->exam_type ." ".$e->academic_year}}</h3>
  <h3>Course Code And Name: {{$e->course_code}}{{ " ".$course_name}}</h3>
  <H3>Semester : {{$semester}}</H3>
  <h5>Full Mark: {{$e->full_mark}}</h5>
  <h5>Pass Mark: {{$e->pass_mark}}</h5>
  <h5>Exam Date: {{$e->exam_date}}</h5>
  @endforeach
  <hr>
  <br>
</div>
    
</div>

   
		
<div class="row">

    <div class="container">

<h4>Attempt <u>All</u> Questions</h4>
     <?php 
     $i=1;
    $l = 0;
    $m = 0;
    $p = 0;
    $mth = 0;
    $f =0;
     ?>
     <table width="100%">
            @foreach($q as $post)
           
            <?php 
            if($post->question_type == "saq" ){
                    
                    if($i==1)
                    
                    echo "<tr><td colspan='2'><b>Short Answer Questions</b>"."    ----- ".$saq ."*".$post->assigned_mark."=".$saq*$post->assigned_mark." Marks</td></tr>";
                    if($i>$saq)
                    $i=1;
            } 
            if($post->question_type == "laq" ){
                    $l++;
                    if($l==1)
                    echo "<tr><td colspan='2'><b>Long Answer Questions</b>"."    ----- ".$laq ."*".$post->assigned_mark."=".$laq*$post->assigned_mark." Marks</td></tr>";
                    if($i>$laq)
                    $i=1;
            } 
            if($post->question_type == "mcq" ){
                    $m++;
                    if($m==1)
                    echo "<tr><td colspan='2'><b>Multiple Choice Questions</b>"."    ----- ".$mcq ."*".$post->assigned_mark."=".$mcq*$post->assigned_mark." Marks</td></tr>";
                    if($i>$mcq)
                    $i=1;
            } 
            if($post->question_type == "pq" ){
                    $p++;
                    if($p==1)
                    echo "<tr><td colspan='2'><b>Problems/Computational Questions</b>"."    ----- ".$pq ."*".$post->assigned_mark."=".$pq*$post->assigned_mark." Marks</td></tr>";
                    if($i>$pq)
                    $i=1;
            } 
            if($post->question_type == "match" ){
                    $mth++;
                    if($mth==1)
                    echo "<tr><td colspan='2'><b>Multiple Choice Questions</b>"."    ----- ".$match ."*".$post->assigned_mark."=".$match*$post->assigned_mark." Marks</td></tr>";
                    if($i>$mth)
                    $i=1;
            } 
            if($post->question_type == "fib" ){
                    $f++;
                    if($f==1)
                    echo "<tr><td colspan='2'><b>Multiple Choice Questions</b>"."    ----- ".$fib ."*".$post->assigned_mark."=".$fib*$post->assigned_mark." Marks</td></tr>";
                    if($i>$f)
                    $i=1;
            } 
            ?>
             <tr>
            <td width="2%"><?php echo $i++;?>)</td>
				<td><?php echo $post->question;?></td>
                
            </tr>
                @endforeach
        
        </table>
        
    </div>
</div>
           
		
  </body>
</html>