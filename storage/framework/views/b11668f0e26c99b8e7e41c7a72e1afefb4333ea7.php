<?php $__env->startSection('title','Courses | Lists'); ?>
<?php $__env->startSection('content'); ?>

<div class="x_content">
	<div id="posts">
		<h1>Courses</h1>
<hr>
		<button class="btn btn-success btn-sm" @click.prevent="add">Add New</button>

		<table class="table table-bordered table-striped" style="table-layout: fixed;">
			<thead>
				<tr role="row">
					<th width=3%>SN</th>
					<th width=25%>Course Name</th>

					<th>Course Code</th>

					<th width="20%">Action</th>

				</tr>
			</thead>
			<tbody>
				<tr v-for="(post, index) in posts">
					<td>{{index+1}}</td>

						<td><a :href="'<?php echo e(url('chapters/')); ?>/' + post.course_code" title="Create Chapters">{{post.course_name}}</a></td>
						<td>{{ post.course_code }}</td>


						<td>

							<button class="btn btn-primary btn-sm" title="Edit Course" @click.prevent="edit(post)"><i class="fa fa-pencil"></i></button>

							<button title="Delete Course" class="btn btn-danger btn-sm" @click.prevent="destroy(post)"><i class="fa fa-trash-o"></i></button>
							<a :href="'<?php echo e(url('chapters/')); ?>/' + post.course_code" title="Create Chapters" class="btn btn-success btn-sm" ><i class="fa fa-plus"></i> List/Create Chapter</a>


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
				<li v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'active' : '']"> <a href="#" @click.prevent="changePage(page)">{{ page }}</a>
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
									<div v-if="newPost.id">
										<input type="hidden" name="id" v-model="newPost.id">
									</div>
									<div class="col-md-8">
										<label>Course Name:</label>
										<input type="hidden" name="_token" id="token" value="<?php echo e(csrf_token()); ?>">

										<div class="form-group">
											<input v-model="newPost.course_name" class="form-control" type="text" id="title" name="course_name" placeholder="Course Name" maxlength="80" required>
										</div>

										<div class="form-group">
												<label>Course Code:</label>
											<input v-model="newPost.course_code" class="form-control" type="text" id="author" name="course_code" placeholder="course code" required>
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
		<div id="updateModal" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title">Update Post</h4>
					</div>
					<div class="modal-body">
						<form id="update" method="POST" enctype="multipart/form-data" v-on:submit.prevent="update">
							<input type="hidden" name="course_code" v-model="updatePost.course_code">
							<div class="col-md-8">
								<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
								<div class="form-group">
										<label>Course Name:</label>
											<input v-model="updatePost.course_name" class="form-control" type="text" id="title" name="course_name" placeholder="Course Name" maxlength="80">
										</div>

										<div class="form-group">
												<label>Course Code:</label>
											<input v-model="updatePost.course_code" class="form-control" type="text" id="author" name="course_code" placeholder="course_code" disabled>
										</div>
							</div>

							<div class="clearfix"></div>
							<div class="modal-footer">
								<slot name="footer">
									<button type="submit" class="btn btn-success pull-left">Update</button>
									<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
								</slot>
							</div>
						</form>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<!-- /.modal -->
	</div>
</div><?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
	Vue.config.devtools = true;
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');
// start app
var vm = new Vue({
	el: '#posts',
	data: {
		posts: [],
		course: [],

		newPost: {
			
			'course_name': '',
			'course_code': ''

		},
		updatePost: {
			
			'course_name': '',
			'course_code': ''
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
			this.$http.get('course/list?page=' + page).then((response) => {
				console.log(response);
				this.posts = response.data.data.data;
				this.pagination = response.data.pagination;
			});
		},
		add: function () {
			$("#addModal").modal('show');
			this.newPost = {};
		},
		store: function () {
			var data = new FormData(document.getElementById("create"));
			this.$http.post('course/store', data).then((response) => {
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
	<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layouts::app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>