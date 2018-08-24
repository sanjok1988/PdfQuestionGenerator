@extends('Layouts::app')
 @section('title','Roles | Lists')
 @section('content')
<style>
#role > ul > li{
  float: left;
padding: 10px;
}
</style>
<div class="x_content">
	<div id="posts">
		<h1>Roles</h1>
<hr>
		<button class="btn btn-success btn-sm" @click.prevent="add">Add New</button>

		<table class="table table-bordered table-striped" style="table-layout: fixed;">
			<thead>
				<tr role="row">
					<th width=3%>SN</th>

					<th  width="15%">Role</th>
					<th>Description</th>


					<th width="10%">Action</th>

				</tr>
			</thead>
			<tbody>
				<tr v-for="(post, index) in posts">
					<td>@{{index+1}}</td>

						<td>@{{post.display_name}}</td>
						<td>@{{ post.description }}</td>

						<td>
							<button class="btn btn-primary btn-sm" title="Edit Post" @click.prevent="edit(post)"><i class="fa fa-pencil"></i></button>

                <button title="Delete Post" class="btn btn-danger btn-sm" @click.prevent="destroy(post)"><i class="fa fa-trash-o"></i></button>


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
			<div class="modal-dialog">
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

									<div class="col-md-8">
										<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
										<!-- <span v-if="formErrors['title']" class="error text-danger">@{{ formErrors['title'] }}</span> -->
										<div class="form-group">
											<input v-model="newPost.name" class="form-control" type="text" name="name" placeholder="Title" maxlength="80">
										</div>

										<div class="form-group">
											<input v-model="newPost.display_name" class="form-control" type="text" name="display_name" placeholder="Display Name">
										</div>
                    <div class="form-group">
											<input v-model="newPost.description" class="form-control" type="text" name="description" placeholder="Description">
										</div>

									</div>
									<div class="col-md-4">


									</div>
									<div class="clearfix"></div>
                  <div class="row" id="role">
                    <ul>
                      <li v-for="per in permission" style="list-style: none">
                        <label for="checkbox">
                          <input v-model="checked" type="checkbox" name="permission[]" :value="per.id">@{{ per.display_name }}</label>
                      </li>
                    </ul>
                  </div>
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
						<h4 class="modal-title">Update</h4>
					</div>
					<div class="modal-body">
						<form id="update" method="POST" enctype="multipart/form-data" v-on:submit.prevent="update">
							<input type="hidden" name="id" v-model="updatePost.id">
							<div class="col-md-8">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<!-- <span v-if="formErrors['title']" class="error text-danger">@{{ formErrors['title'] }}</span> -->
								<div class="form-group">
									<input v-model="updatePost.name" class="form-control" type="text" name="name" placeholder="Name" maxlength="80" disabled>
								</div>
                <div class="form-group">
                  <input v-model="updatePost.display_name" class="form-control" type="text" name="display_name" placeholder="Display Name">
                </div>
                <div class="form-group">
                  <input v-model="updatePost.description" class="form-control" type="text" name="description" placeholder="Description">
                </div>


							</div>
							<div class="col-md-4">
                <div class="panel">
                  <p>
                    User can grant and revoke access.
                  </p>
                </div>


							</div>
							<div class="clearfix"></div>
              <div class="row" id="role">
                <ul>
                  <li v-for="per in permission" style="list-style: none">
                    <label for="checkbox">
                      <input v-model="checked" type="checkbox" name="permission[]" :value="per.id">@{{ per.display_name }}</label>
                  </li>
                </ul>
              </div>
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
</div>@endsection
@section('styles')
@endsection
@section('scripts')
	<script src="{{url("vue/js/roles.js")}}"></script>

>@endsection
