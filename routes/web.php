<?php

// ROOT ROUTE
Route::get('/', function () {
    return view('welcome');
}); 


Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/dashboard', 'HomeController@index')->name('staffDashboard'); 

Route::prefix('staff')->group(function() {
    Route::get('/profile','StaffController@profile')->name('staffProfile'); 
    Route::get('/edit-profile','StaffController@editProfile')->name('staffEditProfile');
    Route::get('/change-password','StaffController@changePassword')->name('staffChangePassword');
    Route::post('/update-password','StaffController@updatePassword')->name('staffUpdatePassword');
    Route::post('/update-profile','StaffController@updateProfile')->name('staffUpdateProfile');
    Route::get('/view-qualification','StaffController@viewQualification')->name('staff.viewQualification'); 


    Route::resource('/association','AssociationProgramController'); 
    Route::get('/association/delete/{id}','AssociationProgramController@delete'); 


    Route::resource('/publication','PublicationController'); 
    Route::get('/publication/delete/{id}','PublicationController@delete'); 


    Route::resource('/fdpMeeting','FdpMeetingController'); 
    Route::get('/fdpMeeting/delete/{id}','FdpMeetingController@delete'); 


    Route::resource('/papers','PapersController'); 
    Route::get('/papers/delete/{id}','PapersController@delete'); 


    Route::resource('/achivements','AchivementsController'); 
    Route::get('/achivements/delete/{id}','AchivementsController@delete'); 

    Route::resource('/seminarAttended','SeminarAttendedController'); 
    Route::get('/seminarAttended/delete/{id}','SeminarAttendedController@delete'); 
    
    Route::resource('/seminarOrganised','SeminarOrganisedController'); 
    Route::get('/seminarOrganised/delete/{id}','SeminarOrganisedController@delete'); 

    Route::resource('/guestVisited','GuestVisitedController'); 
    Route::get('/guestVisited/delete/{id}','GuestVisitedController@delete'); 

    Route::resource('/guestLecture','GuestLectureMDPController'); 
    Route::get('/guestLecture/delete/{id}','GuestLectureMDPController@delete'); 
    
    Route::resource('/majorProgram','MajorProgrammesController'); 
    Route::get('/majorProgram/delete/{id}','MajorProgrammesController@delete'); 
    
    Route::get("/generate-report",'GenerateReportController@index'); 
    Route::post("/generate-report/create",'GenerateReportController@getData');
}); 

// DEPT ROUTES
Route::prefix('dept')->group(function() {
    Route::get('/login', 'Auth\DeptLoginController@showLoginForm')->name('dept.login');
    Route::post('/login', 'Auth\DeptLoginController@login')->name('dept.login.submit');
    Route::post('/logout', 'Auth\DeptLoginController@logout')->name('dept.logout');
    Route::get('/dashboard', 'DeptController@index')->name('dept.home');

    Route::resource('/deptFdpMeeting','DeptFDPMeeting'); 
    Route::get('/deptFdpMeeting/delete/{id}','DeptFDPMeeting@delete');

    Route::resource('/deptSeminarOrganised','DeptSeminarOrganised'); 
    Route::get('/deptSeminarOrganised/delete/{id}','DeptSeminarOrganised@delete');

    Route::resource('/deptMajorProgram','DeptMajorProgramme'); 
    Route::get('/deptMajorProgram/delete/{id}','DeptMajorProgramme@delete');

    
    Route::get("/generate-report",'DeptGenerateReport@index'); 
    Route::post("/generate-report/create",'DeptGenerateReport@getData');
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
    Route::get('/view-staff/{userId}', 'AdminController@viewStaffDetails')->name('admin.viewStaffDetails');
    Route::get('/edit-staff/{userId}', 'AdminController@getStaffDetails')->name('admin.getStaffDetails');
    Route::get('/delete-staff/{id}', 'AdminController@delete')->name('admin.deleteStaff');
    Route::post('/add-qualification', 'AdminController@addQualification')->name('admin.addStaffQualification');
    Route::get('/get-qualification/{userId}', 'AdminController@getQualification')->name('admin.getStaffQualification');
    Route::get('/remove-qualification/{id}','AdminController@removeQualification')->name('admin.staffRemoveQualification');


    Route::get('/add-dept', function () {return view('admin.addDept');});
    Route::get('/edit-dept/{id}', 'AdminDeptController@show');
    Route::post('/add-dept', 'AdminDeptController@addDept')->name('admin.addDept');
    Route::post('/update-dept', 'AdminDeptController@updateDept')->name('admin.updateDept');
    Route::get('/view-dept', 'AdminDeptController@viewDept')->name('admin.viewDept');
    Route::get('/delete-dept/{id}', 'AdminDeptController@delete')->name('admin.deleteDept');

    Route::get("/generate-report",'AdminGenerateReportController@index');
    Route::get("/generate-report/create/{staffId}",'AdminGenerateReportController@viewData');
    Route::post("/generate-report/create",'AdminGenerateReportController@getData');

    Route::get("/activity",'AdminActivity@index');
    Route::get("/activity/{table}",'AdminActivity@getData');
    Route::get("/activity/report/allReport",'AdminActivity@allReport');
    Route::get("/report/{table}",'AdminActivity@getReport');

});
//ADMIN STAFF ACTIVITY
Route::prefix('admin/staffActivity/{type}/{staffId}')->group(function() {
    Route::get('/', 'AdminStaffActivityController@index')->name('admin.staffData');

    Route::resource('/achivements','AdminAchivementsController'); 
    Route::get('/achivements/delete/{id}','AdminAchivementsController@delete'); 

    Route::resource('/association','AdminAssociationController'); 
    Route::get('/association/delete/{id}','AdminAssociationController@delete');
    
    Route::resource('/fdpMeeting','AdminFdpMeetingController'); 
    Route::get('/fdpMeeting/delete/{id}','AdminFdpMeetingController@delete');

    Route::resource('/papers','AdminPapersController'); 
    Route::get('/papers/delete/{id}','AdminPapersController@delete');

    Route::resource('/publication','AdminPublicationController'); 
    Route::get('/publication/delete/{id}','AdminPublicationController@delete');

    Route::resource('/seminarOrganised','AdminSeminarOrganisedController'); 
    Route::get('/seminarOrganised/delete/{id}','AdminSeminarOrganisedController@delete');

    Route::resource('/seminarAttended','AdminSeminarAttendedController'); 
    Route::get('/seminarAttended/delete/{id}','AdminSeminarAttendedController@delete');

    Route::resource('/guestVisited','AdminGuestVisitedController'); 
    Route::get('/guestVisited/delete/{id}','AdminGuestVisitedController@delete');

    Route::resource('/guestLecture','AdminGuestLectureController'); 
    Route::get('/guestLecture/delete/{id}','AdminGuestLectureController@delete');

    Route::resource('/majorProgram','AdminMajorProgrammeController'); 
    Route::get('/majorProgram/delete/{id}','AdminMajorProgrammeController@delete');
});