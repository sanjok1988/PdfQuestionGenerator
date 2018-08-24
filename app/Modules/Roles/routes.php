<?php

Route::group(array('prefix'=>'roles','namespace'=>'App\Modules\Roles\Controllers'),function(){

	Route::get('/','RolesController@showPage');
	Route::get('list',['uses'=>'RolesController@index']);
  Route::post('store',['uses'=>'RolesController@store','middleware' => ['permission:role-create']]);
  Route::post('update',['uses'=>'RolesController@update','middleware' => ['permission:role-edit']]);
  Route::post('delete/{id}',['uses'=>'RolesController@destroy','middleware' => ['permission:role-delete']]);
	Route::post('getRolePermissions/{id}','RolesController@getRolePermissions');



});
 ?>
