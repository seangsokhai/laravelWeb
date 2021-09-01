<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// use App\Email;
// use App\Mail\StoreMail;
// use Illuminate\Support\Facades\Mail;

// Route::get('/email', function(){
//     $email = Email::first();
//     // return $student;
//     Mail::to('email@email.com')->send( new StoreMail( $email ));
//     return view('email.store-email')->with([
//         'email' => $email
//     ]);
// });

//home
Route::get('/', 'HomeController@index')->name('home-page');

//about
Route::get('about', 'AboutController@index')->name('about');

//contact
Route::get('contact','ContactController@index')->name('contact');
Route::post('contact/storeEmail', 'ContactController@storeEmail')->name("storeEmail");

//blog
Route::get('blog/search', 'BlogController@search')->name('search');
Route::get('blog','BlogController@index')->name('blog');
Route::get('blog/show/{id}','BlogController@show')->name('blog-detail');
Route::get('blog/{id}','BlogController@category')->name('blog-category');

//calendar
Route::get('calendar','CalendarController@index')->name('calendar');

//course
Route::get('course', 'CourseController@index')->name('course');
Route::get('course/{id}', 'CourseController@category')->name('course-category');
Route::get('course/show/{id}', 'CourseController@show')->name('course-detail');
Route::post('course/storeStudent', 'CourseController@storeStudent')->name("storeStudent");
Route::post('course/storeSubscribQuery', 'CourseController@storeSubscribQuery')->name("storeSubscribQuery");


Route::get('/share-social', 'ShareSocialController@shareSocial')->name('share-social');
