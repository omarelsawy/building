<?php


Route::get('/', function () {
    return view('welcome');
});

/*
admin route
*/
Route::group(['middleware' => ['web','admin']] , function(){

#datatable ajax
Route::get('/adminpanel/users/data' , ['as' => 'adminpanel.users.data' , 'uses' => 'UsersController@anyData'] );
Route::get('/adminpanel/bu/data' , ['as' => 'adminpanel.bu.data' , 'uses' => 'BuController@anyData'] );
Route::get('/adminpanel/contact/data' , ['as' => 'adminpanel.contact.data' , 'uses' => 'ContactController@anyData'] );

  #main admin
 Route::get('/adminpanel' , 'AdminController@index');

  #users
 Route::resource('/adminpanel/users' , 'UsersController');
 Route::post('/adminpanel/user/changePassword' , 'UsersController@updatePassword');
 Route::get('/adminpanel/change_status/{id}/{status}' , 'BuController@changeStatus');

 Route::get('/adminpanel/users/{id}/delete' , 'UsersController@destroy');


 #siteSetting
  Route::get('/adminpanel/sitesetting' , 'SiteSettingController@index');
  Route::post('/adminpanel/sitesetting' , 'SiteSettingController@store');

  #bu
 Route::resource('/adminpanel/bu' , 'BuController' , ['except' => ['index' , 'show']]);
 Route::get('/adminpanel/bu/{id?}' , 'BuController@index');

 Route::get('/adminpanel/bu/{id}/delete' , 'BuController@destroy');

 #contact
Route::resource('/adminpanel/contact' , 'ContactController');
Route::get('/adminpanel/contact/{id}/delete' , 'ContactController@destroy');



});


/*
user route
*/

Route::group(['middleware' => 'web'], function () {
  Route::auth();
  Route::get('/', function () {
      return view('welcome');
  });

  Route::get('/ShowAllBullding' , 'BuController@showAllEnable');
  Route::get('/ForRent' , 'BuController@ForRent');
  Route::get('/ForBuy' , 'BuController@ForBuy');
  Route::get('/type/{type}' , 'BuController@showByType');

  Route::get('/search' , 'BuController@search');
  Route::get('/SingleBullding/{id}' , 'BuController@ShowSingle');
  Route::get('/ajax/bu/infomation' , 'BuController@getAjaxInfo');

  Route::get('/user/create/bullding' , 'BuController@userAddView');
  Route::post('/user/create/bullding' , 'BuController@userStore');

//must be login
  Route::get('/user/bulldingShow' , 'BuController@showUserBullding')->middleware('auth');
  Route::get('/user/bulldingShowwaiting' , 'BuController@bulldingShowwaiting')->middleware('auth');
  Route::get('/user/editsetting' , 'UsersController@userEditInfo')->middleware('auth');
  Route::patch('/user/editsetting' , ['as' => 'user.editsetting' , 'uses' => 'UsersController@userUpdateProfile'])->middleware('auth');
  Route::post('/user/changePassword' , 'UsersController@changePassword')->middleware('auth');

  Route::get('/user/edit/bullding/{id}' , 'BuController@userEditBullding')->middleware('auth');
  Route::patch('/user/update/bullding' , 'BuController@userUpdateBullding')->middleware('auth');





  Route::get('/contact' , 'HomeController@contact');

  Route::post('/contact' , 'ContactController@store');


  Route::get('/home', 'HomeController@index')->middleware('auth');
});
