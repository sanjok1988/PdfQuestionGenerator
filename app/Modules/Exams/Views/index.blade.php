@extends('Layouts::app')
@section('title','Exams | Lists')
@section('content')

<div class="x_content">
	<div id="posts">
		<h1>Exams</h1>
<hr>
<?php if(Auth::user()->hasRole("examhead")){ ?>
		<button class="btn btn-success btn-sm" @click.prevent="add">Create New Exam</button>
<?php }?>
		<table class="table table-bordered table-striped" style="table-layout: fixed;">
			<thead>
				<tr role="row">
					<th width=3%>SN</th>
					<th width=15%>Exam Type</th>

					<th>Academic Year</th>
                    <th>Semester</th>
                    <th>Course Code</th>
                    <th>Full Mark</th>
                    <th>Pass Mark</th>
                    <th>Exam Date</th>

					<th width="35%">Action</th>

				</tr>
			</thead>
			<tbody>
				<tr v-for="(post, index) in posts">
					<td>@{{index+1}}</td>

						<td>@{{post.exam_type}}</td>
						<td>@{{ post.academic_year }}</td>
                        <td>@{{post.semester}}</td>
                        <td>@{{post.course_code}}</td>
                        <td>@{{post.full_mark}}</td>
                        <td>@{{post.pass_mark}}</td>
                        <td>@{{post.exam_date}}</td>
						<td>

							<button class="btn btn-primary btn-sm" title="Edit" @click.prevent="edit(post)"><i class="fa fa-pencil"></i></button>

							<button title="Delete" class="btn btn-danger btn-sm" @click.prevent="destroy(post)"><i class="fa fa-trash-o"></i></button>
							<a :href="'{{url('questions/generate/add?exam_id=')}}' + post.exam_id +'&semester='+post.semester+'&course_code='+post.course_code" title="Add Questions for this exam" class="btn btn-success btn-sm" ><i class="fa fa-plus"></i> Add Ques.</a>
<a :href="'{{url('questions/generate/view?exam_id=')}}' + post.exam_id +'&semester='+post.semester+'&course_code='+post.course_code" title="Add Questions for this exam" class="btn btn-warning btn-sm" ><i class="fa fa-eye"></i> View Ques.</a>
<a :href="'{{url('questions/generate/export?exam_id=')}}' + post.exam_id +'&semester='+post.semester+'&course_code='+post.course_code" title="Export PDF" class="btn btn-info btn-sm" ><i class="fa fa-file"></i> PDF</a>

						</td>
				</tr>
			</tbody>
		</table>
		<!-- Pagination -->
		<nav>
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
			<div class="modal-dialog" >
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
									<div v-if="newPost.exam_id">
										<input type="hidden" name="exam_id" v-model="newPost.exam_id">
									</div>
									<div class="col-md-8">
										<label>Exam Type:</label>
										<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

										<div class="form-group">
											<input v-model="newPost.exam_type" class="form-control" type="text"  name="exam_type" placeholder="Exam Type" maxlength="80" required>
										</div>

										<div class="form-group">
												<label>Academic Year:</label>
											<input v-model="newPost.academic_year" class="form-control" type="text"  name="academic_year" placeholder="Academic Year" required>
										</div>
                                        <div class="form-group">
												<label>Semester:</label>
											<input v-model="newPost.semester" class="form-control" type="text" name="semester" placeholder=" Semester" required>
										</div>
                                        <div class="form-group">
												<label>Course:</label>
											 <select name="course_code" v-model="courses.course_code" required>
                                                <option value="">Choose Course</option>
                                                <option v-for="(course, index) in courses" :value="course.course_code">@{{ course.course_name}}</option>
                                            </select>
                                           
										</div>
                                        
                                        <div class="form-group">
												<label>Full Mark:</label>
											<input v-model="newPost.full_mark" class="form-control" type="text"  name="full_mark" placeholder=" Full Mark" required>
										</div>
                                        <div class="form-group">
												<label>Pass Mark:</label>
											<input v-model="newPost.pass_mark" class="form-control" type="text"  name="pass_mark" placeholder=" Pass Mark" required>
										</div>
                                        <div class="form-group">
												<label>Exam Date:</label>
											<input v-model="newPost.exam_date" class="form-control" type="text" name="exam_date" placeholder="Exam Date" required>
										</div>
									</div>

									<div class="clearfix"></div>
									<div class="modal-footer">
										<slot name="footer">
											<button type="submit" class="btn btn-success btn-sm pull-left">Create New</button>
											<button type="button" class="btn btn-default btn-sm pull-left" data-dismiss="modal">Close</button>
										</slot>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		@endsection
@section('styles')
@endsection
@section('scripts')
<script>
	Vue.config.devtools = true;
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
// start app
var vm = new Vue({
	el: '#posts',
	data: {
		posts: [],
		courses: [],

		newPost: {
			
			'exam_type': '',
			'exam_date': '',
            'semester':'',
            'full_mark':'',
            'pass_mark':'',
            'academic_year':'',
            'course_code':''

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
		checked: []
	},
	computed: {
		isActived: function () {
			return this.pagination.current_page;
		},
		pagesNumber: function () {
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
			this.$http.get('exams/list?page=' + page).then((response) => {
				console.log(response);
				this.posts = response.data.data.data;
                this.courses = response.data.courses;
				this.pagination = response.data.pagination;
			});
		},
		add: function () {
			$("#addModal").modal('show');
			this.newPost = {};
		},
		store: function () {
			var data = new FormData(document.getElementById("create"));
			this.$http.post('exams/store', data).then((response) => {
				this.changePage(this.pagination.current_page);
				this.posts.push(this.newPost);
				$("#addModal").modal('hide');

				toastr.success('Created Successfully.', 'Success Alert', {
					timeOut: 5000
				});
			}, (response) => {
				this.formErrors = response.data;
			});
		},
		edit: function (post) {
			this.updatePost.course_name = post.course_name;
			this.updatePost.course_code = post.course_code;
			$('#updateModal').modal('show');
		},
		update: function () {
			var data = new FormData(document.getElementById("update"));
			this.$http.post('course/update', data).then((response) => {
				this.changePage(this.pagination.current_page);
				this.posts.push(this.newPost);
				$("#updateModal").modal('hide');
				this.updatePost.course_code = '';
				toastr.success('Updated Successfully.', 'Success Alert', {
					timeOut: 5000
				});
			}, (response) => {
				this.formErrors = response.data;
			})
		},
		destroy: function (post) {
			this.$http.post('course/delete/' + post.course_code).then((response) => {
				var index = this.posts.indexOf(post);
				this.posts.splice(index, 1);
				toastr.success('Deleted Successfully.', 'Success Alert', {
					timeOut: 5000
				});
			});
		},

		changePage: function (page) {
			this.pagination.current_page = page;
			this.fetchPosts(page);
		}
	}
})
</script>
	@endsection
