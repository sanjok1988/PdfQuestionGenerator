<?php

Route::group(array('prefix'=>'users','namespace'=>'App\Modules\Users\Controllers'),function(){

	Route::get('/','UsersController@showPage');
	Route::get('list',['uses'=>'UsersController@index']);
  Route::post('store',['uses'=>'UsersController@store','middleware' => ['permission:role-create']]);
  Route::post('update',['uses'=>'UsersController@update','middleware' => ['permission:role-edit']]);
  Route::post('delete/{id}',['uses'=>'UsersController@destroy','middleware' => ['permission:role-delete']]);
	Route::post('getRole/{id}','UsersController@getRole');
});
 ?>
