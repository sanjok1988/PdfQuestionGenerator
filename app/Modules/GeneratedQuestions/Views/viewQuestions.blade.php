@extends('Layouts::app') @section('title','Questions | Lists') @section('content')

<div class="x_content">

	<div id="posts">
		
		<h1>Exam : {{$exam_id}} : Semester : {{$semester}} : course_code {{$course_code}}</h1>

    <a href="{{url('question/help')}}"><h6>Help: Types Of Questions</h6></a>
<hr>

<a href="{{url('questions/generate/export?exam_id='.$exam_id.'&semester='.$semester.'&course_code='.$course_code)}}">Export To PDF</a>

<hr>
			
		

	<div class="row">
		<div class="col-md-12">


	</div>
		

		<table class="table table-bordered table-striped" style="table-layout: fixed;">
			<thead>
				<tr role="row">
					<th width=8%>SN</th>
					
					<th>Questions</th>
                    <th width=10%>Assigned Mark</th>
					<th width="10%">Difficulty Level</th>
                    <th width="10%">Question Type</th>
					<th>Chapters</th>
					<th width="15%">Action</th>

				</tr>
			</thead>
			<tbody>
            <?php $i=1;?>
            @foreach($q as $post)
				<tr>
					<td ><?php echo $i++;?></td>
					<td >
						<?php echo $post->question;?>
					</td>
					
						<td >{{$post->assigned_mark}}</td>
						<td >{{ $post->difficulty_level }}</td>
                        <td >{{ $post->question_type }}</td>

						<td ><div style="word-wrap: break-word">{{ $post->chapter_id }}</div></td>
						
						<td >
<a href="{{url('questions/generate/destroy?qid='.$post->qid)}}" title="Delete Question" class="btn btn-danger btn-sm" ><i class="fa fa-trash-o"></i></a>

						</td>
				</tr>
                @endforeach
			</tbody>
		</table>

		
@endsection