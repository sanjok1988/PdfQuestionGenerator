<?php

Route::group(array('prefix'=>'course','namespace'=>'App\Modules\Courses\Controllers'),function(){
  Route::get('/','CoursesController@index');
	Route::get('list','CoursesController@getList');
	//Route::post('store','CoursesController@store');
	Route::post('store',['uses'=>'CoursesController@store','middleware' => ['permission:course-create']]);

	//Route::post('update','CoursesController@store');
	Route::post('update',['uses'=>'CoursesController@store','middleware' => ['permission:course-edit']]);

	//Route::post('delete/{id}','CoursesController@delete');
	Route::post('delete/{id}',['uses'=>'CoursesController@delete','middleware' => ['permission:course-delete']]);

});
 ?>
