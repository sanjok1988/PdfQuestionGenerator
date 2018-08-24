@extends('Layouts::app') @section('title','Questions | Lists') @section('content')
<?php
$exam_id = "";
$semester = "";
if(isset($_GET['exam_id'])){
    $exam_id = $_GET['exam_id'];
}
if(isset($semester)){
    $semester = $_GET['semester'];
}
?>
<div class="x_content">

	<div id="posts">
		
		<h1>Questions for : {{$semester}} : Exam {{$exam_id}}<span class="label label-warning ">  </span></h1>

    <a href="{{url('question/help')}}"><h6>Help: Types Of Questions</h6></a>


			
		

	<div class="row">
		<div class="col-md-12">

			<div class="row">
							<div class="col-md-12">
								<form id="create" method="POST" enctype="multipart/form-data" v-on:submit.prevent="store">
									<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

									<div class="col-md-8">
										<div class="form-group">
										<input  type="hidden"  name="exam_id"  value="{{$exam_id}}" >
										<div class="form-group">
											<label>Choose Question Type:</label>
											<section>
												<input type="radio" name="question_type" value="saq"> Short answer questions<br>
												<input type="radio" name="question_type" value="laq"> long answers question<br>
												<input type="radio" name="question_type" value="mcq"> Multiple-choice questions<br>
												<input type="radio" name="question_type" value="pq"> Problems/computational questions<br>
												<input type="radio" name="question_type" value="match"> Match<br>
												<input type="radio" name="question_type" value="fib"> Fill in the blanks<br>
											</section>
										</div>
										<div class="form-group">
											<label>Choose Difficulty Level:</label>
											<section>
												<input type="radio" name="difficulty_level" value="difficult"> Difficult<br>
												<input type="radio" name="difficulty_level" value="normal"> Normal<br>
												<input type="radio" name="difficulty_level" value="easy"> Easy
											</section>
										</div>
										<div class="form-group">
										<label>No. of Question:</label>
											<input v-model="newPost.no_of_question" class="form-control" type="number"  name="no_of_question" placeholder="No. Of Questions" >
										</div>
										
										
									</div>
								
									<div class="clearfix"></div>
									<div class="modal-footer">
										<slot name="footer">
											<button type="submit" class="btn btn-success btn-lg pull-left">Add Questions
												<span id="loading" hidden><i class="fa fa-spinner fa-spin"></i></span>
											</button>
											<button type="button" class="btn btn-default btn-lg pull-left" data-dismiss="modal">Close</button>
										</slot>
									</div>
								</form>
							</div>
						</div>

		</div>
		
	</div>
		

		
	</div>
</div>@endsection
@section('styles')
	{{ HTML::style('admin/assets/sweetalert/sweetalert.css')}}
@endsection
@section('scripts')

	{{ HTML::script('admin/assets/sweetalert/sweetalert.min.js')}}

</script>
<script>
Vue.config.devtools = true;
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
vm = new Vue({
    el: '#posts',
    url: '{{url("/")}}',
    data: {
 
        newPost: {
            'exam_id': '',
            'semester': '',
            'difficulty_level': '',
            'question_type': '',
            'revised_mark': ''
   
        }
 
       
		},
    computed: {
        
    },
    mounted() {
        
    },
    methods: {

        store: function() {
            $("#loading").removeAttr("hidden");
            var data = new FormData(document.getElementById("create"));
         
            this.$http.post('store',data).then((response) => {
                
				$("#loading").attr("hidden", "true");
                $("#addModal").modal('hide');

                this.changePage(this.pagination.current_page);
                this.posts.push(this.newPost);

                toastr.success('Created Successfully.', 'Success Alert', {
                    timeOut: 5000
                });
                this.newPost.filename = '';
                this.image = '';

            }, (response) => {
                this.formErrors = response.data;
            });
        }
		
    }
});
</script>
@endsection