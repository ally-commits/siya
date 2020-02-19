<?php

// ROOT ROUTE
Route::get('/', function () {
    return view('welcome');
});
// STAFF ROUTES 
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/dashboard', 'HomeController@index')->name('staffDashboard'); 

Route::prefix('staff')->group(function() {
    Route::get('/profile/{id}','StaffController@profile')->name('staffProfile');
    Route::post('/add-profile','StaffController@addProfile')->name('staffAddProfile');
    Route::post('/edit-profile','StaffController@editProfile')->name('staffEditProfile');
    Route::get('/qualification','StaffController@qualification')->name('staffQualification');
    Route::post('/add-qualification','StaffController@addQualification')->name('staffAddQualification');
    Route::get('/remove-qualification/{id}','StaffController@removeQualification')->name('staffRemoveQualification');
});

// DEPT ROUTES
Route::prefix('dept')->group(function() {
    Route::get('/login', 'Auth\DeptLoginController@showLoginForm')->name('dept.login');
    Route::post('/login', 'Auth\DeptLoginController@login')->name('dept.login.submit');
    Route::post('/logout', 'Auth\DeptLoginController@logout')->name('dept.logout');
    Route::get('/dashboard', 'DeptController@index')->name('dept.home');
});

//ADMIN ROUTES
Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');

    Route::get('/add-staff', function () {return view('admin.addStaff');});
    Route::post('/add-staff', 'AdminController@addStaff')->name('admin.addStaff');
    Route::post('/update-staff', 'AdminController@updateStaff')->name('admin.updateStaff');
    Route::get('/view-staff', 'AdminController@viewStaff')->name('admin.viewStaff');
    Route::get('/delete-staff/{id}', 'AdminController@delete')->name('admin.deleteStaff');
    Route::post('/add-qualification', 'AdminController@addQualification')->name('admin.addStaffQualification');


    Route::get('/add-dept', function () {return view('admin.addDept');});
    Route::post('/add-dept', 'AdminDeptController@addDept')->name('admin.addDept');
    Route::post('/update-dept', 'AdminDeptController@updateDept')->name('admin.updateDept');
    Route::get('/view-dept', 'AdminDeptController@viewDept')->name('admin.viewDept');
    Route::get('/delete-dept/{id}', 'AdminDeptController@delete')->name('admin.deleteDept');
});
