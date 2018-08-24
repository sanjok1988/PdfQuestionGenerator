<?php

Route::group(array('prefix'=>'questions/generate','namespace'=>'App\Modules\GeneratedQuestions\Controllers'),function(){
  Route::get('/','GeneratedQuestionsController@index');
	Route::get('list','GeneratedQuestionsController@getList');
	Route::post('store','GeneratedQuestionsController@store');
	Route::post('update','GeneratedQuestionsController@store');
	Route::post('delete/{id}','GeneratedQuestionsController@delete');
	Route::get('/add','GeneratedQuestionsController@add');
	Route::get('/view','GeneratedQuestionsController@viewQuestions');
	// Route::get('extract','GeneratedQuestionsController@extractQuestions');
	
	// Route::get('/past','GeneratedQuestionsController@getPastquestions');
	Route::get('/export',['uses'=>'GeneratedQuestionsController@exportPDF','middleware' => ['permission:question-export']]);

	//Route::get('/export','GeneratedQuestionsController@exportPDF');
	Route::get('docx', 'GeneratedQuestionsController@exportToWord');
	Route::get("destroy",'GeneratedQuestionsController@deleteQuestion' );
});


 ?>
