<?php
 //Route::post('store',['uses'=>'UsersController@store','middleware' => ['permission:role-create']]);
Route::group(array('prefix'=>'exams','namespace'=>'App\Modules\Exams\Controllers'),function(){
  Route::get('/','ExamsController@index');
	Route::get('list','ExamsController@getList');

	Route::post('store',['uses'=>'ExamsController@store','middleware' => ['permission:course-create']]);

	//Route::post('store','ExamsController@store');
	Route::post('update',['uses'=>'ExamsController@store','middleware' => ['permission:exam-edit']]);

//	Route::post('update','ExamsController@store');
	//Route::post('delete/{id}','ExamsController@delete');
	Route::post('delete/{id}',['uses'=>'ExamsController@delete','middleware' => ['permission:exam-delete']]);

});
 ?>
