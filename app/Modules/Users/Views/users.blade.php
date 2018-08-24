@extends('Layouts::app') @section('title','Users | Lists') @section('content')
<style>
    #role>ul>li {
        float: left;
        padding: 10px;
    }
</style>
<div class="x_content">
    <div id="posts">
        <h1>Users</h1>
        <hr>
        <button class="btn btn-success btn-sm" @click.prevent="add">Add New</button>

        <table class="table table-bordered table-striped" style="table-layout: fixed;">
            <thead>
                <tr role="row">
                    <th width=3%>SN</th>

                    <th width="15%">Name</th>
                    <th>Email</th>


                    <th width="10%">Action</th>

                </tr>
            </thead>
            <tbody>
                <tr v-for="(post, index) in posts">
                    <td v-cloak>@{{index+1}}</td>

                    <td v-cloak>@{{post.name}}</td>
                    <td v-cloak>@{{ post.email }}</td>

                    <td v-cloak>

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
                                        <div class="form-group">
                                            <input v-model="newPost.name" class="form-control" type="text" name="name" placeholder="Name" maxlength="80">
                                            <span v-if="formErrors['name']" class="error text-danger">@{{ formErrors['name'] }}</span>
                                        </div>

                                        <div class="form-group">
                                            <input v-model="newPost.email" class="form-control" type="text" name="email" placeholder="Email">
                                            <span v-if="formErrors['email']" class="error text-danger">@{{ formErrors['email'] }}</span>
                                        </div>
                                        <div class="form-group">
                                            <input v-model="newPost.password" class="form-control" type="password" name="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="password" name="confirm-password" placeholder="confirm password">
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="row" id="role">
                                            <ul>
                                                <li v-for="(value, key) in roles" style="list-style: none">
                                                    <label for="radio">
                            <input v-model="checked" type="radio" name="roles" :value="key">@{{ value }}</label>
                                                </li>
                                            </ul>
                                            <span v-if="formErrors['roles']" class="error text-danger">@{{ formErrors['roles'] }}</span>
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
                        <h4 class="modal-title">Update</h4>
                    </div>
                    <div class="modal-body">
                        <form id="update" method="POST" enctype="multipart/form-data" v-on:submit.prevent="update">
                            <input type="hidden" name="id" v-model="updatePost.id">
                            <div class="col-md-8">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group">
                                    <input v-model="updatePost.name" class="form-control" type="text" name="name" placeholder="Name" maxlength="80">
                                    <span v-if="formErrorsUpdate['name']" class="error text-danger">@{{ formErrorsUpdate['name'] }}</span>
                                </div>
                                <div class="form-group">
                                    <input v-model="updatePost.email" class="form-control" type="text" name="email" placeholder="Email">
                                    <span v-if="formErrorsUpdate['email']" class="error text-danger">@{{ formErrorsUpdate['email'] }}</span>
                                </div>
                                <div class="form-group">
                                    <input v-model="newPost.password" class="form-control" type="password" name="password" placeholder="Password">
                                    <span v-if="formErrorsUpdate['password']" class="error text-danger">@{{ formErrorsUpdate['password'] }}</span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="confirm-password" placeholder="confirm password">
                                </div>


                            </div>
                            <div class="col-md-4">
                                <div class="row" id="role">
                                    <ul>
                                        <li v-for="(value, key) in roles" style="list-style: none">
                                            <label for="checkbox">
                        <input v-model="checked" type="radio" name="roles" :value="key">@{{ value }}</label>
                                        </li>
                                    </ul>
                                    <span v-if="formErrorsUpdate['roles']" class="error text-danger">@{{ formErrorsUpdate['roles'] }}</span>
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
</div>@endsection @section('styles') @endsection @section('scripts')
<script src="{{url('vue/js/users.js')}}"></script>

>@endsection