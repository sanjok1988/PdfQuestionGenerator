<?php


Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get("/","HomeController@index");

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
/*
 * login controller
 */
Route::get('auth/login', 'Auth\AuthController@getLogin');

Route::get('db-admin', ['middleware'=>'auth', function () {
    return view('Layouts::home');
}]);


Route::get('/downloadPDF/{id}','UserDetailController@downloadPDF');



Route::auth();


