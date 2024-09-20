<?php

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

// Employees
Route::resource('/employees', 'EmployeeController');
Route::get('/addEmployee', 'EmployeeController@create');
Route::get('/contacts', 'EmployeeController@contacts');
Route::get('employeeDetails/{id}', 'EmployeeController@employeeDetails')->name('employeeDetails');
Route::get('/deleteEmployee/{id}','EmployeeController@destroy')->name('deleteEmployee/{id}');


// CRUD Users Routes
Route::get('/delete/{id}','UserOperationController@destroy');
Route::get('/addUser','UserOperationController@index');
Route::get('/edit-records','UserUpdateController@index');
Route::get('/edit/{id}','UserUpdateController@show');
Route::post('/edit/{id}','UserUpdateController@edit');

Route::get('profile', 'UserProfileController@profile')->name('profile');
Route::post('updateNameUser', 'UserProfileController@updateNameUser')->name('updateNameUser');
Route::post('updateUserImage', 'UserProfileController@updateUserImage')->name('updateUserImage');
Route::post('updateUserPass', 'UserProfileController@updateUserPass')->name('updateUserPass');




// fisal rahimi.
// teacher
Route::get('addTeacher', 'TeacherController@addTeacher')->name('addTeacher');
Route::post('saveTeacher', 'TeacherController@saveTeacher')->name('saveTeacher');
Route::get('teacherList', 'TeacherController@teacherList')->name('teacherList');
Route::get('editTeacher/{id}', 'TeacherController@editTeacher')->name('editTeacher');
Route::post('updateTeacher', 'TeacherController@updateTeacher')->name('updateTeacher');
Route::get('/deleteTeacher/{id}','TeacherController@destroy')->name('deleteTeacher/{id}');


// studetn.
Route::get('addStudent', 'StudentController@addStudent')->name('addStudent');
Route::post('saveStudent', 'StudentController@saveStudent')->name('saveStudent');
Route::get('studentList', 'StudentController@studentList')->name('studentList');
Route::get('deleteStudent/{id}', 'StudentController@deleteStudent')->name('deleteStudent');
Route::get('studentDetails/{id}', 'StudentController@studentDetails')->name('studentDetails');
Route::get('editStudent/{id}', 'StudentController@editStudent')->name('editStudent');
Route::post('updateStudent', 'StudentController@updateStudent')->name('updateStudent');



// Create Classes
Route::get('/mainClass', 'MainClassController@index')->name('mainClass');
Route::post('/addMainClass', 'MainClassController@store')->name('addMainClass');
Route::get('/deleteMainClass/{id}','MainClassController@destroy')->name('deleteMainClass/{id}');
Route::get('editMainClass/{id}', 'MainClassController@edit')->name('editMainClass');
Route::post('updateMainClass', 'MainClassController@update')->name('updateMainClass');
Route::get('mainClassDetails/{id}', 'MainClassController@details')->name('mainClassDetails');


// Subject Controller Routes
Route::post('/addSubject', 'SubjectController@store')->name('addSubject');
Route::get('/mainClassDetails/deleteSubject/{id}','SubjectController@destroy')->name('deleteSubject/{id}');
Route::get('/mainClassDetails/editSubject/{id}', 'SubjectController@edit')->name('editSubject');
Route::post('updateSubject', 'SubjectController@update')->name('updateSubject');


// departement category Routes
Route::get('/subClass', 'SubClassController@index')->name('subClass');
Route::post('/addSubClass', 'SubClassController@store')->name('addSubClass');
Route::get('/deleteSubClass/{id}','SubClassController@destroy')->name('deleteSubClass/{id}');
Route::get('editSubClass/{id}', 'SubClassController@edit')->name('editSubClass');
Route::post('updateSubClass', 'SubClassController@update')->name('updateSubClass');
Route::get('subClassDetails/{id}', 'SubClassController@details')->name('subClassDetails');


// Class Member Controller Routes
Route::get('/member', 'ClassMembersController@index')->name('member');
Route::post('/addMember', 'ClassMembersController@store')->name('addMember');
Route::get('/subClassDetails/deleteMember/{id}','ClassMembersController@destroy')->name('deleteMember/{id}');
Route::get('/subClassDetails/editMember/{id}', 'ClassMembersController@edit')->name('editMember');
Route::post('updateMember', 'ClassMembersController@update')->name('updateMember');
Route::get('/subClassDetails/studentMarks/{id}', 'ClassMembersController@studentMarks')->name('studentMarks');
Route::get('/subClassDetails/studentSubjectMarks/{id}/{idd}', 'ClassMembersController@studentSubjectMarks')->name('studentSubjectMarks');



// Student Marks Controller Routes
Route::get('/test', 'MarkController@index')->name('test');
Route::post('/addMark', 'MarkController@store')->name('addMark');
Route::get('/studentMarkInfo/deleteMark/{id}','MarkController@destroy')->name('deleteMark/{id}');
Route::get('/studentMarkInfo/editMark/{id}', 'MarkController@edit')->name('editMark');
Route::post('updateMark', 'MarkController@update')->name('updateMark');
Route::get('/studentMarkInfo/{id}', 'MarkController@studentMarkInfo')->name('studentMarkInfo');
Route::get('/studentMarkInfo/printTranscript/{id}','MarkController@printTranscript')->name('printTranscript/{id}');
Route::get('/studentMarkInfo/printMark/{id}/{sub_grade}','MarkController@printMark')->name('printMark/{id}/{sub_grade}');
