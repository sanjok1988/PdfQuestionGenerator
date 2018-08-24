<?php

Route::group(array('prefix'=>'question','namespace'=>'App\Modules\Questions\Controllers'),function(){
	Route::get('/','QuestionsController@index');
	Route::get('/help','QuestionsController@help');

	Route::get('{course_code}/{chapter_id}','QuestionsController@index');
	Route::get('{course_code}/get/list',['uses'=>'QuestionsController@getList','middleware' => ['permission:question-list']]);

	//Route::get('{course_code}/get/list','QuestionsController@getList');
	Route::get('{course_code}/{chapter_id}/get/list',['uses'=>'QuestionsController@getList','middleware' => ['permission:question-list']]);
	//Route::get('{course_code}/{chapter_id}/get/list','QuestionsController@getList');
	
	Route::post('{course_code}/store/{chapter_id}',['uses'=>'QuestionsController@store','middleware' => ['permission:question-create']]);

	//Route::post('{course_code}/store/{chapter_id}','QuestionsController@store');
	Route::post('update',['uses'=>'QuestionsController@store','middleware' => ['permission:question-edit']]);

	//Route::post('update','QuestionsController@store');
	Route::post('{course_code}/delete/{id}',['uses'=>'QuestionsController@delete','middleware' => ['permission:question-delete']]);

	//Route::post('delete/{id}','QuestionsController@delete');
});
Route::group(array('namespace'=>'App\Modules\Questions\Controllers'),function(){
	
	Route::get('get/list','QuestionsController@getAllList');
});
 ?>
