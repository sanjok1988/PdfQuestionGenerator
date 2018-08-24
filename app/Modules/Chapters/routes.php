<?php

Route::group(array('prefix'=>'chapters','namespace'=>'App\Modules\Chapters\Controllers'),function(){
 
  Route::get('list/{course_code}',['uses'=>'ChaptersController@getList','middleware' => ['permission:chapter-list']]);

   // Route::get('/','ChaptersController@index');
   // Route::get('/{course_code}','ChaptersController@create');
   Route::get('/{course_code}',['uses'=>'ChaptersController@create','middleware' => ['permission:chapter-list']]);

    //Route::get('list/{course_code}','ChaptersController@getList');
    Route::post('store',['uses'=>'ChaptersController@store','middleware' => ['permission:chapter-create']]);

    //Route::post('store','ChaptersController@store');
    //Route::post('update','ChaptersController@store');
    Route::post('update',['uses'=>'ChaptersController@store','middleware' => ['permission:chapter-edit']]);

    Route::post('delete/{id}',['uses'=>'ChaptersController@delete','middleware' => ['permission:chapter-delete']]);
   // Route::post('delete/{id}','ChaptersController@delete');
  });
   ?>
  
