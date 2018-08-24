@extends('Layouts::app')
@section('title','chapters | Lists')
@section('content')
@if(isset($course_code))
		<?php $code = $course_code; ?>
@else
	<?php $code = "";?>
@endif 

<div class="x_content">
	<div id="posts">
		<h1>{{$code}} chapters</h1><h1 v-cloak style="color:red">@{{error}}</h1>
<hr>
<div class="row">
	<div class="col-md-12">
		<form id="create" method="POST" enctype="multipart/form-data" v-on:submit.prevent="store">
			<div v-if="newPost.id">
				<input type="hidden" name="id" v-model="newPost.id">
			</div>
			<div class="col-md-8">
				<label>Enter chapter Name:</label>
				<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
				<input v-model="updatePost.chapter_id"  type="hidden" name="chapter_id" >
				<input type="hidden" name="course_code" value="{{ $code }}">
				<div class="form-group">
					<input v-model="newPost.chapter_name" class="form-control" type="text" name="chapter_name" placeholder="chapter Name" maxlength="80" required>
				</div>	
			</div>

			<div class="clearfix"></div>
			<div class="modal-footer">
				<slot name="footer">
					<button type="submit" id="createbtn" class="btn btn-success btn-sm pull-left">Create New Chapter</button>
					<button type="submit" id="updatebtn" class="btn btn-primary btn-sm pull-left">Update Chapter</button>
				</slot>
			</div>
		</form>
	</div>
</div>

		<table class="table table-bordered table-striped" style="table-layout: fixed;">
			<thead>
				<tr role="row">
					<th width=3%>SN</th>
					<th width=25%>chapter Name</th>
					<th width="20%">Action</th>

				</tr>
			</thead>
			<tbody>
				<tr v-for="(post, index) in posts">
					<td>@{{index+1}}</td>

						<td>@{{post.chapter_name}}</td>

						<td>

							<button class="btn btn-primary btn-sm" title="Edit Post" @click.prevent="edit(post)"><i class="fa fa-pencil"></i></button>

							<button title="Delete Post" class="btn btn-danger btn-sm" @click.prevent="destroy(post)"><i class="fa fa-trash-o"></i></button>
							<a :href="'{{url('question/').'/'.$code}}/' +post.chapter_id" title="View or Create Questions" class="btn btn-success btn-sm" ><i class="fa fa-plus"></i> View/Create Questions</a>


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
		
		
		<!-- /.modal -->
	</div>
</div>@endsection
@section('styles')
@endsection
@section('scripts')
<script>

	Vue.config.devtools = true;
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
// start app
var course_code = '{{$code}}';
var vm = new Vue({
	el: '#posts',
	data: {
		posts: [],
		error:"",
		newPost: {			
			'chapter_name': ''

		},
		updatePost: {
			'chapter_id': '',
			'chapter_name': ''
		
		},
		pagination: {
			total: 0,
			per_page: 2,
			from: 1,
			to: 0,
			current_page: 1
		},
		offset: 4
	
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
		$("#updatebtn").hide();
		this.fetchPosts(this.pagination.current_page);
	},
	methods: {
		fetchPosts(page) {
			this.$http.get('list/'+course_code+'?page=' + page)
			.then((response) => {
				console.log(response.body);
				if(response.body == 403)
						this.error = "You don't have sufficient permission to access. please contact admin";
				else{
					this.posts = response.data.data.data;
					this.pagination = response.data.pagination;
			
				}
					
			
			},
			(err)=>{
				console.log("Err", err);
			})
			.catch((e)=>{
				console.log("Caught", e);
			});
		},
		add: function () {
			$("#addModal").modal('show');
			this.newPost = {};
		},
		store: function () {
			var data = new FormData(document.getElementById("create"));
			
			this.$http.post('store', data).then((response) => {
				if(response.body == 403)
						this.error = "You don't have sufficient permission to access. please contact admin";
				else{
					this.changePage(this.pagination.current_page);
					this.posts.push(this.newPost);
					this.newPost.chapter_name = "";
					toastr.success('Created Successfully.', 'Success Alert', {
						timeOut: 5000
					});
				}
				
			}, (response) => {
				this.formErrors = response.data;
			});
		},
		edit: function (post) {
			this.newPost.chapter_name = post.chapter_name;
			this.updatePost.chapter_id = post.chapter_id;
			console.log(post.chapter_id+post.chapter_name);
			$("#createbtn").hide();
			$("#updatebtn").show();
			
		},
		update: function () {
			var data = new FormData(document.getElementById("create"));
			this.$http.post('update', data).then((response) => {
				if(response.body == 403)
						this.error = "You don't have sufficient permission to access. please contact admin";
				else{
					this.changePage(this.pagination.current_page);
					this.posts.push(this.newPost);
					$("#createbtn").show();
					$("#updatebtn").hide();
					this.updatePost.chapter_id = '';
					this.newPost.chapter_name = '';
					toastr.success('Updated Successfully.', 'Success Alert', {
						timeOut: 5000
					});
				}
				
			}, (response) => {
				this.formErrors = response.data;
			})
		},
		destroy: function (post) {
			this.$http.post('delete/' + post.chapter_id).then((response) => {
				if(response.body == 403)
						this.error = "You don't have sufficient permission to access. please contact admin";
				else{
					var index = this.posts.indexOf(post);
					this.posts.splice(index, 1);
					toastr.success('Deleted Successfully.', 'Success Alert', {
						timeOut: 5000
					});
				}
				
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
