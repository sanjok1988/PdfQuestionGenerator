@extends('Layouts::app') @section('title','Questions | Lists') @section('content')
<?php
$cid = "";
$code = "";
if(isset($chapter_id)){
    $cid = $chapter_id;
}
if(isset($course_code)){
    $code = $course_code;
}

?>
<div class="x_content">

	<div id="posts">
		
		<h1>Questions : {{$code}} {{App\Modules\Courses\Models\Courses::getCourseNameById($code)}} : chapter {{$cid}} : {{App\Modules\Chapters\Models\Chapters::getChapterNameById($cid)}}<span class="label label-warning ">  </span></h1>

    <a href="{{url('question/help')}}"><h6>Help: Types Of Questions</h6></a>
<hr>
		
		

	<div class="row">
		<div class="col-md-12">

			<button class="btn btn-success pull-left" @click.prevent="add"><i class="fa fa-plus" aria-hidden="true"></i> Add New</button>

		</div>
		
	</div>
		

		<table class="table table-bordered table-striped" style="table-layout: fixed;">
			<thead>
				<tr role="row">
					<th width=8%>SN</th>
					
					<th>Questions</th>
                    <th width=10%>Assigned Mark</th>
					<th width="10%">Difficulty Level</th>
					{{-- <th>Chapters</th>
                    
					<th width="6%">Course</th> --}}

					<th width="15%">Action</th>

				</tr>
			</thead>
			<tbody>
				<tr v-for="(post, index) in posts">
					<td v-cloak>@{{index+1}}</td>
					<td v-cloak>
						@{{post.question}}
					</td>
					
						<td v-cloak>@{{post.assigned_mark}}</td>
						<td v-cloak>@{{ post.difficulty_level }}</td>
						{{-- <td v-cloak><div style="word-wrap: break-word">@{{ post.chapter_id }}</div></td>
						<td v-cloak>@{{ post.course_code }}</td> --}}
						<td v-cloak>

							<button class="btn btn-primary btn-sm" title="Edit Post" @click.prevent="edit(post)"><i class="fa fa-pencil"></i></button>
							<button title="Delete Post" class="btn btn-danger btn-sm" @click.prevent="destroy(post)"><i class="fa fa-trash-o"></i></button>


						</td>
				</tr>
			</tbody>
		</table>
		<!-- Pagination -->
		<nav v-cloak>
			<ul class="pagination">
				<li v-if="pagination.current_page > 1">
					<a href="#" aria-label="Previous" @click.prevent="changePage(pagination.current_page - 1)"> <span aria-hidden="true">«</span>
					</a>
				</li>
				<li v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'active' : '']"> <a href="#" @click.prevent="changePage(page)">@{{ page }}</a>
				</li>
				<li v-if="pagination.current_page < pagination.last_page">
					<a href="#" aria-label="Next" @click.prevent="changePage(pagination.current_page + 1)"> <span aria-hidden="true">»</span>
					</a>
				</li>
			</ul>
		</nav>
		<div id="addModal" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog" style="width:80%">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Create New</h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<form id="create" method="POST" enctype="multipart/form-data" v-on:submit.prevent="store">
									<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
									
									
									<div class="col-md-8">
										<div class="form-group">

                                            <input  type="hidden"  name="chapter_id"  value="{{$cid}}" >
                                            <input v-model="newPost.question_id" type="hidden" name="question_id" value="">
                                        
                                            <div class="form-group">
                                            <label>Enter Question Text:</label>
                                                <textarea v-model="newPost.question" id="myeditor" class="form-control  my-editor" name="question" cols="10" placeholder="Question" required></textarea>
                                            </div>
                                            <div class="form-group">
                                            <label>Assigned Mark:</label>
                                                <input v-model="newPost.assigned_mark" class="form-control" type="number"  name="assigned_mark" placeholder="Assigned Mark" required>
                                            </div>
										
									    </div>
                                        <div class="col-md-12">
                                            
                                            <div class="form-group">
                                                <label>Choose Difficulty Level:</label>
                                                <section >
                                                    <input v-model="newPost.difficulty_level" type="radio" name="difficulty_level" value="difficult"> Difficult<br>
                                                    <input v-model="newPost.difficulty_level" type="radio" name="difficulty_level" value="normal"> Normal<br>
                                                    <input v-model="newPost.difficulty_level" type="radio" name="difficulty_level" value="easy"> Easy
                                                </section>
                                            </div>
                                            <div class="form-group">
                                                <label>Choose Question Type:</label>
                                                <section>
                                                    <input v-model="newPost.question_type" type="radio" name="question_type" value="saq"> Short answer questions<br>
                                                    <input v-model="newPost.question_type" type="radio" name="question_type" value="laq"> long answers question<br>
                                                    <input v-model="newPost.question_type" type="radio" name="question_type" value="mcq"> Multiple-choice questions<br>
                                                    <input v-model="newPost.question_type" type="radio" name="question_type" value="pq"> Problems/computational questions<br>
                                                    <input v-model="newPost.question_type" type="radio" name="question_type" value="match"> Match<br>
                                                    <input v-model="newPost.question_type" type="radio" name="question_type" value="fib"> Fill in the blanks<br>
                                                </section>
                                            </div>
                                        
                                        </div>
                                 </div>
                                    <div class="col-md-4" >
                                    <h4 style="background:#eee;text-align:center;padding:15px">Help</h4>
                                    <i>The Keywords classification according to bloom taxonomy</i>
                                    <ul style="background:#eee;padding:20px">
                                    <li>Easy: what</li>
                                    <li>Normal: Describe, Discuss</li>
                                    <li>Hard: Explain</li>
                                    </ul>
                                    </div>
									<div class="clearfix"></div>
									<div class="modal-footer">
										<slot name="footer">
											<button type="submit" class="btn btn-success btn-lg pull-left">Create New
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
		</div>
		
	</div>
</div>@endsection
@section('styles')
	{{ HTML::style('admin/assets/sweetalert/sweetalert.css')}}
@endsection
@section('scripts')
	

	{{ HTML::script('plugins/ckeditor/ckeditor.js')}}

	{{ HTML::script('admin/assets/sweetalert/sweetalert.min.js')}}

<script>
	$(function () {
	    CKEDITOR.replace('myeditor');
      CKEDITOR.replace('upeditor');

			}); 

Vue.config.devtools = true;
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
var vm = new Vue({
    el: '#posts',
    data: {
        posts: [],
        post: '',
       
		chapter_id : '{{$cid}}',
		course_code:'{{$code}}',
 
        newPost: {
            'question_id': '',
            'chapter_id': '',
            'question': '',
            'difficulty_level': '',
            'question_type': '',
            'assigned_mark': ''
   
        },
        pagination: {
            total: 0,
            per_page: 2,
            from: 1,
            to: 0,
            current_page: 1
        },
        offset: 4,
        formErrors: {},
        formErrorsUpdate: {},
        checked: [],
		q:'',
		searchResult:'',
		selected:''
		
		},
    computed: {
        isActived: function() {
            return this.pagination.current_page;
        },
        pagesNumber: function() {
            if (!this.pagination.to) {
                return [];
            }
            var from = this.pagination.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            var to = from + (this.offset * 2);
            if (to >= this.pagination.last_page) {
                to = this.pagination.last_page;
            }
            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        }
    },
    mounted() {
        this.fetchPosts(this.pagination.current_page);
    },
    methods: {
        fetchPosts(page) {
            this.$http.get(this.chapter_id+'/get/list?page=' + page).then((response) => {
				
                this.posts = response.data.data.data;
                //this.chapter = response.data.chapter;
               // this.pagination = response.data.pagination;
            });
        },
        add: function() {
            $("#loading").attr("hidden");
            $("#addModal").modal('show');
            this.newPost = {};
            this.checked = [];
            CKEDITOR.instances.myeditor.setData('');

        },
        store: function() {
            $("#loading").removeAttr("hidden");
            var data = new FormData(document.getElementById("create"));
            var content = CKEDITOR.instances.myeditor.getData();
            data.append('question', content);
          
            this.$http.post('store/'+this.chapter_id, data).then((response) => {
                
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
        },
        edit: function(post) {
            $("#loading").attr("hidden", "true");
			this.newPost.question_id = post.question_id;
            this.newPost.chapter_id = this.chapter_id;
			this.newPost.difficulty_level = post.difficulty_level;
			this.newPost.question_type = post.question_type;
			this.newPost.assigned_mark = post.assigned_mark;
            CKEDITOR.instances.myeditor.setData(post.question);
            

            //this.checked = post.chapter.split(",");
            $('#addModal').modal('show');
        },
        update: function() {
            $("#addModal").removeAttr("hidden");
            var data = new FormData(document.getElementById("create"));
            var content = CKEDITOR.instances.myeditor.getData();
            data.append('question', content);
            
            this.$http.post('update', data).then((response) => {
                $("#loading").attr("hidden");

                this.changePage(this.pagination.current_page);
                this.posts.push(this.newPost);
                $("#addModal").modal('hide');
        
                toastr.success('Updated Successfully.', 'Success Alert', {
                    timeOut: 5000
                });
            }, (response) => {
                this.formErrors = response.data;
            })
        },
        destroy: function(post) {
            swal({
                    title: "Are you sure?",
                    text: "Your will not be able to recover this data!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: true,
                    closeOnCancel: false
                },
                function(isConfirm) {
                    vm.post = post;

                    if (isConfirm) {

                        vm.$http.post('delete/' + vm.post.question_id).then((response) => {
                            var index = vm.posts.indexOf(vm.post);
                            vm.posts.splice(index, 1);
                            toastr.success('Deleted Successfully.', 'Success Alert', {
                                timeOut: 5000
                            });
                        });
                    } else {
                        swal("Cancelled", "Your data is safe", "error");
                    }


                });


        },
        changePage: function(page) {
            this.pagination.current_page = page;
            this.fetchPosts(page);
        },
        
		
		isEmptyObj: function(obj){
			if(Object.keys(obj).length === 0)
				return true;
			else
				return false;
		}
    }
});
</script>
@endsection