<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    $routeName = auth()->user() && (auth()->user()->is_student || auth()->user()->is_teacher) ? 'admin.calendar.index' : 'admin.home'; 
    if (session('status')) {
        return redirect()->route($routeName)->with('status', session('status'));
    }

    return redirect()->route($routeName);
});

Auth::routes(['register' => false]);
// Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Lessons
    Route::delete('lessons/destroy', 'LessonsController@massDestroy')->name('lessons.massDestroy');
    Route::resource('lessons', 'LessonsController');

    // School Classes
    Route::delete('school-classes/destroy', 'SchoolClassesController@massDestroy')->name('school-classes.massDestroy');
    Route::resource('school-classes', 'SchoolClassesController');

    Route::get('calendar', 'CalendarController@index')->name('calendar.index');

    //Slide Show
    Route::delete('slide/destroy', 'SlideController@massDestroy')->name('slide.massDestroy');
    Route::resource('slide', 'SlideController');

    //About Page
    Route::get('about', 'AboutController@index')->name("about");
    Route::post('about/update/{id}', 'AboutController@update')->name("about.update");

    //team
    Route::delete('team/destroy', 'TeamController@massDestroy')->name('team.massDestroy');
    Route::resource('team', 'TeamController');

    //About Page
    Route::get('setting', 'SettingController@index')->name("setting");
    Route::post('setting/update/{id}', 'SettingController@update')->name("setting.update");

    //blog category
    Route::delete('blog_category/destroy', 'BlogCategoryController@massDestroy')->name('blog_category.massDestroy');
    Route::resource('blog_category', 'BlogCategoryController');

    //blog category
    Route::delete('blog', 'BlogController@massDestroy')->name('blog.massDestroy');
    Route::resource('blog', 'BlogController');

    //main category
    Route::delete('main-category/destroy', 'MainCategoryController@massDestroy')->name('main-category.massDestroy');
    Route::resource('main-category', 'MainCategoryController');

    //sub category
    Route::delete('sub-category/destroy', 'SubCategoryController@massDestroy')->name('sub-category.massDestroy');
    Route::resource('sub-category', 'SubCategoryController');

    //Course
    Route::delete('course/destroy', 'CourseController@massDestroy')->name('course.massDestroy');
    Route::resource('course', 'CourseController');

    //Instructor
    Route::delete('instructor/destroy', 'InstructorController@massDestroy')->name('instructor.massDestroy');
    Route::resource('instructor', 'InstructorController');

    //Schedule
    Route::delete('schedule/destroy', 'ScheduleController@massDestroy')->name('schedule.massDestroy');
    Route::resource('schedule', 'ScheduleController');

    //Student
    Route::delete('student/destroy', 'StudentController@massDestroy')->name('student.massDestroy');
    Route::resource('student', 'StudentController');

    //Subscrib Query
    Route::delete('subscrib-query/destroy', 'SubscribQueryController@massDestroy')->name('subscrib-query.massDestroy');
    Route::resource('subscrib-query', 'SubscribQueryController');

    //Email
    Route::delete('email/destroy', 'EmailController@massDestroy')->name('email.massDestroy');
    Route::resource('email', 'EmailController');

    // CKeditor
    Route::get('ckeditor', 'CkeditorController@index')->name('ckeditor');
    Route::post('ckeditor/image_upload', 'CkeditorController@upload')->name('upload');

});
