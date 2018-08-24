@extends('Layouts::app') @section('title','Questions | Lists') @section('content')

<div class="x_content">

	<div id="posts">		

	<div class="row">
		<div class="col-md-12">

			<div class="row">
							<div class="col-md-12">
								<form id="create" method="GET" enctype="multipart/form-data" action="generate/add">
									
									<div class="col-md-8">
										<div class="form-group">									
										<label>Exam:</label>
											<input class="form-control" type="text"  name="exam_id" >
										</div>
										<div class="form-group">
                                        <label>Semester</label>
											<input class="form-control" type="text"  name="semester">
										</div>
										
									<div class="clearfix"></div>
									<div class="modal-footer">
										<slot name="footer">
											<button type="submit" class="btn btn-success btn-lg pull-left">Next
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
	

	{{ HTML::script('plugins/ckeditor/ckeditor.js')}}

	{{ HTML::script('admin/assets/sweetalert/sweetalert.min.js')}}


@endsection